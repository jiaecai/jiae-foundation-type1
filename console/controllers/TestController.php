<?php
namespace console\controllers;

use Yii;
use common\base\BaseConsoleController;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Video;
use EasyWeChat\Message\Voice;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Article;
use EasyWeChat\Message\Material;

/**
 * Site controller
 */
class TestController extends BaseConsoleController
{

    /**
     * 测试微信支付
     * @return string
     */
   public function actionWxPay(){
       //todo
       $userId="缓存的";
       //todo 带有订单和用户身份，等待用户下单，有下单按钮，点完后到达创建订单页面

       $app = new Application(Yii::$app->params['WECHAT']);
       $payment = $app->payment;

       $easyWechatPayForm = new \common\forms\EasyWechatPayForm();
       $prepayId=$easyWechatPayForm->createSingleWareOrder('wareId','url','openId');//蛋类商品下单

       $config = $payment->configForJSSDKPayment($prepayId);
       // 这个方法是取得js里支付所必须的参数用的。 没这个啥也做不了，除非你自己把js的参数生成一遍
       $js = $app->js;

       /*
       return $this->render('pay_confirm', [
           'config' => $config,
           'js' => $js,
           'wareId' => $wareId,
       ]);
       */

   }

}
