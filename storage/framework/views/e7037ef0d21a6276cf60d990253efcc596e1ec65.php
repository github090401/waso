<li>
    <div class="liLeft">所属分类</div>
    <div class="liRight">
        <?php echo Form::hidden('type',old('type',Request::get('type'))); ?>

        <?php echo Form::select('field[type]',config('status.service_directory_type'),old('field[type]'),['class'=>'checkNull']); ?>

    </div>
    <div class="clear"></div>
</li>
<li>
    <div class="liLeft">名称</div>
    <div class="liRight">
        <?php echo Form::text('field[name]',old('field[name]'),['class'=>'checkNull']); ?>

    </div>
    <div class="clear"></div>
</li>

<li class="sevenLi">
    <div class="liLeft">内容</div>
    <div class="liRight">
        <?php echo $__env->make('vendor.ueditor.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script id="container" name="field[content]"   type="text/plain">
            <?php echo optional($business_management)->field['content']; ?>

        </script>
    </div>
    <div class="clear"></div>
</li>