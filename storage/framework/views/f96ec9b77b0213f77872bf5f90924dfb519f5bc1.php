<div class="right">

                <!--  编辑框  -->
                <?php echo $__env->make('member_centers.user_companies.create_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="info" v-show="!create_edit">
                    <div class="tit bigTit">
                        <h5>企业信息</h5>
                        <p>填写企业信息，选择税票等税务信息。</p>
                    </div>
                    <div class="addreses">
                        <ul>
                            <li class="th">
                                <span class="num">序号</span>
                                <span class="name">企业全称</span>
                                <span class="type">含税类型</span>
                                <span class="peo">财务人员</span>
                                <span class="pho">联系电话</span>
                                <span class="oth">操作</span>
                                <div class="clear"></div>
                            </li>

                        <?php $__empty_1 = true; $__currentLoopData = $user_companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="tr">
                                    <em class="change_view" >
                                        <span class="num LikeBtn"><?php echo e($user_company->number); ?></span>
                                        <span class="name LikeBtn"><?php echo e($user_company->name); ?></span>
                                        <span class="type LikeBtn"><?php echo e($user_company->invoice_type); ?></span>
                                        <span class="peo LikeBtn"><?php echo e($user_company->finance); ?></span>
                                        <span class="pho LikeBtn"><?php echo e($user_company->finance_phone); ?></span>
                                        <span class="oth">
                                            <a class="change_edit" @click="edit('<?php echo e(route('user_companies.edit',$user_company->id)); ?>')"> 编辑</a>
                                            <?php if(!$user_company->default): ?>
                                            <a class="Del" data_title="<?php echo e($user_company->name); ?>" data_url="<?php echo e(url('/user_companies/destory')); ?>" data_id="<?php echo e($user_company->id); ?>"> 删除 </a>
                                             <?php endif; ?>
                                             <a class="noteIco <?php if(!$user_company->default): ?> note <?php endif; ?>" @click="set_default('<?php echo e(route('user_companies.update',$user_company->id)); ?>')"> 设为默认 </a>
                                        </span>
                                        <div class="clear"></div>
                                    </em>
                                    <div class="clear"></div>
                                    <dl class="LikeBtn">
                                        <dd>
                                            <div class="taTit">序号：</div>
                                            <div class="taCon"><?php echo e($user_company->number); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">企业全称：</div>
                                            <div class="taCon"><?php echo e($user_company->name); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">联系电话：</div>
                                            <div class="taCon"><?php echo e($user_company->unit_phone); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">注册地址：</div>
                                            <div class="taCon"><?php echo e($user_company->address); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">邮政编码：</div>
                                            <div class="taCon"><?php echo e($user_company->zip); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">传真号码：</div>
                                            <div class="taCon"><?php echo e($user_company->fax); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">企业网址：</div>
                                            <div class="taCon"><a href="" target="_blank"><?php echo e($user_company->url); ?></a></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">含税类型：</div>
                                            <div class="taCon"><?php echo e($user_company->invoice_type); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">企业税号：</div>
                                            <div class="taCon"><?php echo e($user_company->tax_number); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">开户银行：</div>
                                            <div class="taCon"><?php echo e($user_company->opening_bank); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">银行账号：</div>
                                            <div class="taCon"><?php echo e($user_company->account); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">开户行地址：</div>
                                            <div class="taCon"><?php echo e($user_company->bank_address); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">开户行电话：</div>
                                            <div class="taCon"><?php echo e($user_company->bank_phone); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">财务人员：</div>
                                            <div class="taCon"><?php echo e($user_company->finance); ?></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">财务电话：</div>
                                            <div class="taCon"><?php echo e($user_company->finance_phone); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <dd>
                                            <div class="taTit">票据收件信息：</div>
                                            <div class="taCon"><?php echo e($user_company->logistics); ?></div>
                                            <div class="clear"></div>
                                        </dd>
                                        <div class="clear"></div>
                                    </dl>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li>没有企业信息</li>
                          <?php endif; ?>
                        </ul>

                        <div class="btns">
                            <button class="AllBtn" @click="create()">新增企业信息</button>
                        </div>
                    </div>
                    <!--   地址表格完成  -->

                </div>
            </div>