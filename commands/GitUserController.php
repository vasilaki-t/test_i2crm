<?php

namespace app\commands;

use app\models\GitRepo;
use app\models\GitUser;
use Github\Client;
use Symfony\Component\HttpClient\HttplugClient;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Expression;

/**
 * Update git repositories
 * Class GitUserController
 */
class GitUserController extends Controller
{
    /**
     * Index action
     * @return int
     */
    public function actionIndex()
    {
        Yii::info("Repositories upd start", "application.%s.%s", __CLASS__, __METHOD__);

        $client = Client::createWithHttpClient(new HttplugClient());
        $client->authenticate(\Yii::$app->params['git']['login'], \Yii::$app->params['git']['password'], Client::AUTH_CLIENT_ID);

        foreach (GitUser::find()->all() as $user) {
            $repositories = [];

            try {
                $repositories = $client->api('user')->repositories($user->login, 'owner', 'updated_at', 'desc');
            } catch (\Exception $exception) {
                Yii::error($exception->getMessage(), "application.%s.%s", __CLASS__, __METHOD__);
                return ExitCode::UNSPECIFIED_ERROR;
            } finally {
                $user->last_update = new Expression('NOW()');
                $user->save();
            }

            Yii::info(sprintf("Repositories count: %s", count($repositories)), "application.%s.%s", __CLASS__, __METHOD__);

            if (!empty($repositories)) {
                foreach ($repositories as $repository) {
                    if ($repository['id']) {
                        Yii::info(sprintf("Add/Upd repos: %d", $repository['id']), "application.%s.%s", __CLASS__, __METHOD__);
                        $repo = GitRepo::getByRepoId($repository['id']);
                        $dateUpdate = new \DateTime($repository['updated_at']);

                        $repo->user_id = $user->id;
                        $repo->repo_id = $repository['id'];
                        $repo->last_update = $dateUpdate->format('Y-m-d h:i:s');

                        if ($repo->validate()) {
                            $repo->save();
                        }
                    }
                }
            }
        }

        Yii::info("Repositories upd end", "application.%s.%s", __CLASS__, __METHOD__);
        return ExitCode::OK;
    }
}