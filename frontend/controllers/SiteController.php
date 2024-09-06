<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\ChangePasswordForm;
use common\models\User;
use yii\widgets\ActiveForm;
use yii\web\Response;
use frontend\models\UserSearch;
use yii\helpers\ArrayHelper;
use frontend\models\AuthItem;
use frontend\models\UserAdd;
use frontend\models\Balance;
use frontend\models\FinancialYear;
use yii\db\Expression;
date_default_timezone_set("Asia/Kolkata");
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => \yii\web\ErrorAction::class,
    //         ],
    //         'captcha' => [
    //             'class' => \yii\captcha\CaptchaAction::class,
    //             'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
    //         ],
    //     ];
    // }
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
                'layout' => Yii::$app->user->isGuest?'login_layout':'main',
                
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'page' => [
				'class' => 'yii\web\ViewAction',
			],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login_layout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    // public function actionAddUser(){
    //     $userModel = new UserAdd();
    //     if (\Yii::$app->request->isAjax && $userModel->load(\Yii::$app->request->post())) {
    //         \Yii::$app->response->format = Response::FORMAT_JSON;
    //         return ActiveForm::validate($userModel);
    //     }
    //     if ($this->request->isPost) {
    //         if( $userModel->load(\Yii::$app->request->post())){
    //             $user = new User();
    //             $user->username = $userModel->username;
    //             $user->email = $userModel->email;
    //             $user->setPassword($userModel->password);
    //             $user->generateAuthKey();
    //             $time = strtotime(date('Y-m-d H:i:s'));
    //             if($user->save()){
    //                 \Yii::$app->db->createCommand("INSERT INTO auth_assignment (item_name, user_id, created_at) VALUES ('$userModel->role', $user->id, $time)")->execute();
    //                 Yii::$app->session->setFlash('success','New user created successfully.');
    //             }else
    //                 Yii::$app->session->setFlash('danger','New user added failed!!!');
    //         }
            
    //         return $this->redirect(Yii::$app->request->referrer);
    //     }
    //     $roles = ArrayHelper::map(AuthItem::find()->where(['type' => 1])->all(), 'name', 'name');
    //     return $this->renderAjax('add_user', [
    //         'userModel' => $userModel,
    //         'roles'=> $roles
    //     ]);
    // }

    // public function actionUserList()
    // {
    //     $searchModel = new UserSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('user_list', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    // public function actionRoleChange($id) 
    // {
    //     // Here, $id is userFk of EmployeeDetails (User table primary key)
    //     $model = new UserAdd();
    //     $model->role = key(\Yii::$app->authManager->getRolesByUser($id));
    //     $previous_role = $model->role;

    //     if ($model->load(Yii::$app->request->post())) {
    //         if($previous_role == $model->role)
    //             return $this->redirect(['index']);      // No changes

    //         $auth = Yii::$app->authManager;

    //         $transaction = \Yii::$app->db->beginTransaction();
    //         try {
    //             Yii::$app->authManager->revokeAll($id);

    //             if(!$authorRole = $auth->getRole($model->role)) {
    //                 Yii::$app->session->setFlash('warning', 'There was a problem assigning new role. Please contact Developer.');
    //                 $transaction->rollBack();
    //                 return $this->redirect(Yii::$app->request->referrer);
    //             }
    //             $auth->assign($authorRole, $id);
    //             $transaction->commit();
    //         } catch (\Exception $e) {
    //             $transaction->rollBack();
    //             Yii::$app->getSession()->setFlash('danger', 'An error occured while editing role of the user.');
    //             return $this->redirect(Yii::$app->request->referrer);
    //         }

    //         Yii::$app->getSession()->setFlash('success', '<h5>User role has been updated.</h5>');
    //         return $this->redirect(Yii::$app->request->referrer);
    //     }

    //     $roles = ArrayHelper::map(AuthItem::find()->where(['type' => 1])->all(), 'name', 'name');
  
    //     return $this->renderAjax('edit_login', [
    //         'model' => $model,
    //         'roles' => $roles,
    //     ]);
    // }

    public function actionPasswordReset($id)
    {
        $user = User::findIdentity($id);
        $password = mt_rand(10000000, 99999999);
        $user->setPassword($password);
        if($user->save())
            Yii::$app->session->setFlash('success',"Password Reset successfully. New Password is $password.");
        else 
            
            Yii::$app->session->setFlash('danger','Password Reset failed!!!!!');

        return $this->redirect(Yii::$app->request->referrer);
    }
    public function actionChangePassword() {
        $model = new ChangePasswordForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = User::findIdentity(Yii::$app->user->id);
            if($user->validatePassword($model->oldPassword)) {
                $user->setPassword($model->newPassword);
                if($user->save()) {
                    Yii::$app->session->setFlash('success', 'Password changed successfully!');
                } else {
                    echo 1;exit;
                }
                return $this->redirect(['index']);
            } else
                Yii::$app->session->setFlash('danger', 'The old password you entered is not correct!');
        }
        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }
}
