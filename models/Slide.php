<?php

namespace kouosl\slider\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property int $id
 * @property int $slideId
 * @property string $imageContent
 * @property string $caption
 * @property string $updated_at
 * @property string $created_at
 *
 * @property Slider $slide
 */
class Slide extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slideId'], 'required'],
            [['slideId'], 'integer'],
            [['imageContent'], 'string'],
            [['file'], 'file'],
            [['updated_at', 'created_at'], 'safe'],
            [['caption'], 'string', 'max' => 255],
            [['slideId'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['slideId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slideId' => 'Slide ID',
            'imageContent' => 'Image Content',
            'file' => 'Image Upload',
            'caption' => 'Caption',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlide()
    {
        return $this->hasOne(Slider::className(), ['id' => 'slideId']);
    }
}
