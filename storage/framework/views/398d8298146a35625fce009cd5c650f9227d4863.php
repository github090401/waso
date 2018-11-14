
<?php $__env->startSection('title','联系我们'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('css/about.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=i2uMOi4L4ZPYFLQ7v2it6zKBlKQtx1qx"></script>
    <script src="<?php echo e(asset('js/about.js')); ?>"></script>
    <script src="<?php echo e(asset('js/map.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="body">
        <div id="crumbs"><div class="wrap"><a href="/">首页</a> > <a href="<?php echo e(route('about')); ?>">关于我们</a> > 联系我们</div></div>

        <div class="wrap">

            <div class="aboutBox">
                <?php if ($__env->exists('site.abouts.about_link')) echo $__env->make('site.abouts.about_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="tab_box">
                    <div class="PC_show"><div class="map" id="dituContent"></div></div>
                    <div class="P_show"><img class="lazy" src="<?php echo e(asset('pic/map.jpg')); ?>"></div>
                    <div class="contact">
                        <ul class="phones" >
                            <h5>联系方式</h5>
                            <li>公司全称：成都网烁信息科技有限公司</li>
                            <li>服务热线：400-028-1968 &nbsp;&nbsp;&nbsp;&nbsp; (028)-85099673 &nbsp;&nbsp;&nbsp;&nbsp; 13881950196</li>
                            <li>工作时间：周一至周六 &nbsp;&nbsp;&nbsp;&nbsp; 09:00-18:00（北京时间）</li>
                            <li>传真号码：(028)-85098783</li>
                            <li>邮政编码：610093</li>
                            <li>公司地址：四川省成都市高新区 高朋东路2号 搏润科技园101号</li>
                            <h5 class="lineH5">客服</h5>
                            <li>在线客服：<a href="<?php echo e(route('service_support.online')); ?>">开始咨询 ></a></li>
                            <h5 class="lineH5">建议/意见</h5>
                            <li><a href="<?php echo e(route('service_support.feedback')); ?>">开始提议 ></a></li>
                            <h5 class="lineH5">服务支持</h5>
                            <li><a href="<?php echo e(route('service_support.index')); ?>">产品服务支持 ></a></li>
                            <div class="clear"></div>
                        </ul>

                        <ul class="wei">
                            <h5 class="lineH5">微博/微信</h5>
                            <li><img class="lazy" data-original="<?php echo e(asset('pic/weixin_hover.jpg')); ?>"><h5>网烁微博</h5></li>
                            <li><img class="lazy" data-original="<?php echo e(asset('pic/weixin_hover.jpg')); ?>"><h5>微信公众号</h5></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!--联系结束 -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>