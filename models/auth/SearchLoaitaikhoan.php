<?php

namespace app\models\auth;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\auth\Loaitaikhoan;

/**
 * SearchLoaitaikhoan represents the model behind the search form about `app\models\auth\Loaitaikhoan`.
 */
class SearchLoaitaikhoan extends Loaitaikhoan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_loaitaikhoan'], 'integer'],
            [['ten_loaitaikhoan'], 'safe'],
            [['create_role', 'update_role', 'view_role', 'delete_role', 'export_role'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Loaitaikhoan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_loaitaikhoan' => $this->id_loaitaikhoan,
            'create_role' => $this->create_role,
            'update_role' => $this->update_role,
            'view_role' => $this->view_role,
            'delete_role' => $this->delete_role,
            'export_role' => $this->export_role,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_loaitaikhoan)', mb_strtoupper($this->ten_loaitaikhoan)]);

        return $dataProvider;
    }
}
