<form action="{{ $url }}" method="get">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="search">
        <select name="type" id="" >
            <option value="name">产品型号</option>
            <option value="additional_arguments->product_description">产品描述</option>
            <option value="additional_arguments->page_description">单页描述</option>
        </select>
        <input type="text" name="keyword" value="{{ old('keyword',Request::get('keyword')) }}" required placeholder="请输入关键字">
        <input type="hidden" name="parent_id" value="{{ $parent_id }}" placeholder="">
        <input type="submit" class="Btn green"  value="搜索">
    </div>
</form>