<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

use backend\models\Companies;
use backend\models\CompaniesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompaniesController implements the CRUD actions for Companies model.
 */
class CompaniesController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public function behaviors()
	{
		return array_merge(
			parent::behaviors(),
			[
				'access' => [
					'class' => AccessControl::class,
					'rules' => [
						[
							'allow' => true,
							'roles' => ['@'],
						],
					],
				],

				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'delete' => ['POST'],
					],
				],
			]
		);
	}

	/**
	 * Lists all Companies models.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$searchModel = new CompaniesSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Companies model.
	 * @param int $id ID
	 * @return string
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Companies model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new Companies();

		if ($this->request->isPost) {
			if ($model->load($this->request->post())) {
				$model->created_at = time();

				if ($model->save()) {
					Yii::$app->session->setFlash('success', 'Company created successfully.');
					return $this->redirect(['view', 'id' => $model->id]);

				} else {
					Yii::$app->session->setFlash('error', 'Error creating Company.');
				}
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Companies model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param int $id ID
	 * @return string|\yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($this->request->isPost && $model->load($this->request->post())) {
			if ($model->save()) {
				Yii::$app->session->setFlash('success', 'Company updated successfully.');
			} else {
				Yii::$app->session->setFlash('error', 'Error updating Company.');
			}

			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Companies model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param int $id ID
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}


	/**
	 * Get the company branches
	 * @return array
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionBranches() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		$out = [];
		$selected = '';

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];

			if (!empty($parents)) {
				$company_id = $parents[0];

				if (!empty($company_id)) {
					$out = Companies::findById($company_id)->branches;
				}
			}


			if (empty($_POST['depdrop_params'])) {
				if (count($out) == 1) {
					$selected = $out[0]->id;
				}

			} else {
				$params = $_POST['depdrop_params'];

				if (count($out) == 1) {
					$selected = $out[0]->id;

				} else {
					if (!empty($params[0])) {
						$selected = $params[0];
					}
				}
			}

		}

		return ['output' => $out, 'selected' => $selected];
	}


	/**
	 * Finds the Companies model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param int $id ID
	 * @return Companies the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Companies::findOne(['id' => $id])) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
