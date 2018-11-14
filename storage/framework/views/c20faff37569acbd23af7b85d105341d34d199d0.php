<?php
/**
 * @var  Arcanedev\LogViewer\Entities\Log            $log
 * @var  Illuminate\Pagination\LengthAwarePaginator  $entries
 * @var  string|null                                 $query
 */
?>



<?php $__env->startSection('content'); ?>
    <div class="page-header mb-4">
        <h1>日志 [<?php echo e($log->date); ?>]</h1>
    </div>

    <div class="row">
        <div class="col-lg-2">
            
            <div class="card mb-4">
                <div class="card-header"><i class="fa fa-fw fa-flag"></i> 日志类型</div>
                <div class="list-group list-group-flush log-menu">
                    <?php $__currentLoopData = $log->menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levelKey => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['count'] === 0): ?>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled">
                                <span class="level-name"><?php echo $item['icon']; ?> <?php echo e($item['name']); ?></span>
                                <span class="badge empty"><?php echo e($item['count']); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e($item['url']); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center level-<?php echo e($levelKey); ?><?php echo e($level === $levelKey ? ' active' : ''); ?>">
                                <span class="level-name"><?php echo $item['icon']; ?> <?php echo e($item['name']); ?></span>
                                <span class="badge badge-level-<?php echo e($levelKey); ?>"><?php echo e($item['count']); ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            
            <div class="card mb-4">
                <div class="card-header">
                    [<?php echo e($log->date); ?>]日志信息 :
                    <div class="group-btns pull-right">
                        <a href="<?php echo e(route('log-viewer::logs.show', [$log->date])); ?>" class="btn btn-sm btn-success" >
                            <i class="fa fa-refresh"></i>刷新
                        </a>
                        <a href="<?php echo e(route('log-viewer::logs.download', [$log->date])); ?>" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> 下载
                        </a>
                        <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal">
                            <i class="fa fa-trash-o"></i> 删除
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed mb-0">
                        <tbody>
                            <tr>
                                <td>日志文件路径 :</td>
                                <td colspan="7"><?php echo e($log->getPath()); ?></td>
                            </tr>
                            <tr>
                                <td>日志详情 : </td>
                                <td>
                                    <span class="badge badge-primary"><?php echo e($entries->total()); ?></span>
                                </td>
                                <td>大小 :</td>
                                <td>
                                    <span class="badge badge-primary"><?php echo e($log->size()); ?></span>
                                </td>
                                <td>创建时间 :</td>
                                <td>
                                    <span class="badge badge-primary"><?php echo e($log->createdAt()); ?></span>
                                </td>
                                <td>更新时间 :</td>
                                <td>
                                    <span class="badge badge-primary"><?php echo e($log->updatedAt()); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
                    <form action="<?php echo e(route('log-viewer::logs.search', [$log->date, $level])); ?>" method="GET">
                        <div class=form-group">
                            <div class="input-group">
                                <input id="query" name="query" class="form-control"  value="<?php echo $query; ?>" placeholder="在这里输入关键字搜索">
                                <div class="input-group-append">
                                    <?php if (! (is_null($query))): ?>
                                        <a href="<?php echo e(route('log-viewer::logs.show', [$log->date])); ?>" class="btn btn-secondary">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    <?php endif; ?>
                                    <button id="search-btn" class="btn btn-primary">
                                        <span class="fa fa-fw fa-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="card mb-4">
                <?php if($entries->hasPages()): ?>
                    <div class="card-header">
                        <span class="badge badge-info float-right">
                             <?php echo e($entries->currentPage()); ?> / <?php echo e($entries->lastPage()); ?>

                        </span>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="entries" class="table mb-0">
                        <thead>
                            <tr>
                                
                                <th style="width: 120px;">类型</th>
                                <th style="width: 65px;">时间</th>
                                <th>内容</th>
                                <th class="text-right" style="width: 65px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php /** @var  Arcanedev\LogViewer\Entities\LogEntry  $entry */ ?>
                                <tr>
                                    
                                        
                                    
                                    <td>
                                        <span class="badge badge-level-<?php echo e($entry->level); ?>">
                                            <?php echo $entry->level(); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary">
                                            <?php echo e($entry->datetime->format('H:i:s')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php echo e($entry->header); ?>

                                    </td>
                                    <td class="text-right">
                                        <?php if($entry->hasStack()): ?>
                                            <a class="btn btn-sm btn-light" role="button" data-toggle="collapse" href="#log-stack-<?php echo e($key); ?>" aria-expanded="false" aria-controls="log-stack-<?php echo e($key); ?>">
                                                <i class="fa fa-toggle-on"></i> Stack
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if($entry->hasStack()): ?>
                                    <tr>
                                        <td colspan="5" class="stack py-0">
                                            <div class="stack-content collapse" id="log-stack-<?php echo e($key); ?>">
                                                <?php echo $entry->stack(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <span class="badge badge-secondary"><?php echo e(trans('log-viewer::general.empty-logs')); ?></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php echo $entries->appends(compact('query'))->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    
    <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="delete-log-form" action="<?php echo e(route('log-viewer::logs.delete')); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="date" value="<?php echo e($log->date); ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">删除 <?php echo e($log->date); ?> 日志文件</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>你确定要 <span class="badge badge-danger">删除</span> 这个日志文件 <span class="badge badge-primary"><?php echo e($log->date); ?></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary mr-auto" data-dismiss="modal">不删除</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">删除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("<?php echo e(route('log-viewer::logs.list')); ?>");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception !')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            <?php if (! (empty(log_styler()->toHighlight()))): ?>
            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/(<?php echo join(log_styler()->toHighlight(), '|'); ?>)/gm, '<strong>$1</strong>');

                $this.html(html);
            });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('log-viewer::bootstrap-4._master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>