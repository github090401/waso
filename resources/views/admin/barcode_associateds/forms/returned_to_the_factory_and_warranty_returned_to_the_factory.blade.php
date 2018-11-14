<div class="JJList">
    <ul class="halfTwoUl" id="app">
        {!! Form::model($barcode_associated['barcode_associated'],['route'=>['admin.barcode_associateds.update',$barcode_associated['barcode_associated']->id],'id'=>'barcode_associateds','method'=>'put','onsubmit'=>'return false']) !!}
        <li>
            <div class="liLeft">产品条码：</div>
            <div class="liRight">
                {!!  Form::text('code',old('code',$barcode_associated['code']),['placeholder'=>'产品条码',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">产品类型：</div>
            <div class="liRight">
                {!!  Form::text(null,$barcode_associated['barcode_associated']->product_good->product->title,['placeholder'=>'产品类型',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">产品规格：</div>
            <div class="liRight">
                {!!  Form::hidden('product_good_id',old('product_good_id',$barcode_associated['barcode_associated']->product_good->id),['placeholder'=>'产品规格',"class"=>'checkNull product_good_id','readonly']) !!}
                {!!  Form::text(null,$barcode_associated['barcode_associated']->product_good->name,['placeholder'=>'产品规格',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">入库时间：</div>
            <div class="liRight">
                {!!  Form::text(null,$barcode_associated['barcode_associated']->procurement_plans->updated_at,['placeholder'=>'入库时间',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">供货单位：</div>
            <div class="liRight">
                {!!  Form::text(null,$barcode_associated['barcode_associated']->supplier_managements->name,['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">关联客户：</div>
            <div class="liRight">
                {!!  Form::hidden('user_id',old('user_id',$barcode_associated['barcode_associated']->user->id),['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
                {!!  Form::text(null,$barcode_associated['barcode_associated']->user->username . ' ' .$barcode_associated['barcode_associated']->user->nickname,['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">当前事件：</div>
            <div class="liRight">

                {!!  Form::text(null,config('status.barcode_associateds_type')[$barcode_associated['barcode_associated']->current_state],['placeholder'=>'当前事件',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        @if(!Request::has('search'))
        <li>
            <div class="liLeft">选择事件：</div>
            <div class="liRight">
                @if(Request::has('type'))
                    {!!  Form::hidden('current_state',old('current_state',config('status.barcode_associateds_type')[Request::get('type')]),['placeholder'=>'选择事件',"class"=>'checkNull','v-model'=>'selected']) !!}
                    {!!  Form::text(null,config('status.barcode_associateds_type')[Request::get('type')],['placeholder'=>'选择事件',"class"=>'checkNull','readonly']) !!}
                @else
                    @if($barcode_associated['barcode_associated']->current_state == 'returned_to_the_factory')
                        {!!  Form::select('current_state',array_only(config('status.barcode_associateds_type'),['factory_return']),old('current_state'),['placeholder'=>'选择事件',"class"=>'checkNull select2']) !!}
                    @else
                        {!!  Form::select('current_state',array_only(config('status.barcode_associateds_type'),['quality_return']),old('current_state'),['placeholder'=>'选择事件',"class"=>'checkNull select2']) !!}
                    @endif
                @endif

            </div>
            <div class="clear"></div>
        </li>
        @endif
        @if(!Request::has('search'))
        <li>
            <div class="liLeft">产品成色：</div>
            <div class="liRight">
                {!!  Form::select('product_colour',array_only(config('status.barcode_associateds_type'),['new','good','bad']),old('product_colour',''),['placeholder'=>'产品成色',"class"=>'checkNull select2']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li v-show="show">
            <div class="liLeft">条码录入：</div>
            <div class="liRight">
                {!!  Form::text(null,null,['placeholder'=>'条码录入',"class"=>'code','v-model'=>'code','v-on:keyup.enter'=>"entering()"]) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">新条码：</div>
            <div class="liRight">
                {!!  Form::text('two_code',old('two_code'),['placeholder'=>'新条码',"class"=>'','v-model'=>'new_code','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        @endif
        <li>
            <div class="liLeft">经办人：</div>
            <div class="liRight">
                @php
                    $admin_account=$barcode_associated['admin']->pluck('name','account');
                    $admin_id=$barcode_associated['admin']->pluck('name','id');
                    $order=$barcode_associated['barcode_associated']->order;
                @endphp
                {!!  Form::text(null,$order->markets->name  ?? $admin_id[$barcode_associated['barcode_associated']->user->administrator] ,['placeholder'=>'当前事件',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">采购人员：</div>
            <div class="liRight">
                {!!  Form::text(null,$admin_id[$barcode_associated['barcode_associated']->procurement_plans->purchase ?? admin()->id],['placeholder'=>'采购人员',"class"=>'checkNull','readonly']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <li>
            <div class="liLeft">操作人员：</div>
            <div class="liRight">
                @if(!Request::has('search'))
                {!!  Form::hidden('admin',old('admin',admin()->id),['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
                {!!  Form::text(null,admin()->name,['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
                    @else
                    {!!  Form::text(null,$admin_id[$barcode_associated['barcode_associated']->admin],['placeholder'=>'关联客户',"class"=>'checkNull','readonly']) !!}
                @endif
            </div>
            <div class="clear"></div>
        </li>
        <li class="allLi">
            <div class="liLeft">信息备注：</div>
            <div class="liRight">
                {!!  Form::hidden('supplier_managements_id',old('supplier_managements_id',$barcode_associated['barcode_associated']->procurement_plans->supplier_managements->id ?? 0),['placeholder'=>'供应商id',"class"=>'','readonly']) !!}
                {!!  Form::hidden('order_id',old('order_id',$barcode_associated['barcode_associated']->order->id ?? 0),['placeholder'=>'订单id',"class"=>'','readonly']) !!}
                {!!  Form::hidden('procurement_plans_id',old('procurement_plans_id',$barcode_associated['barcode_associated']->procurement_plans->id ?? 0),['placeholder'=>'入库id',"class"=>'','readonly']) !!}
                {!!  Form::hidden('warehouse_out_management_id',old('warehouse_out_management_id',$barcode_associated['barcode_associated']->warehouse_out_management->id ?? 0),['placeholder'=>'出库id',"class"=>'','readonly']) !!}
                {!!  Form::textarea('postscript',old('postscript',$barcode_associated['barcode_associated']->postscript),['placeholder'=>'信息备注',"class"=>'']) !!}
            </div>
            <div class="clear"></div>
        </li>
        <div class="clear"></div>
        {!! Form::close() !!}
    </ul>
</div>