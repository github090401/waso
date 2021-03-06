@extends('admin.layout.default')
@section('content')
    <div class="nowWebBox">
        <div class="PageBtn">
            <div class="phoneBtns">
                <button class="Btn Refresh ">刷新</button>
                @can('create business_managements')
                    <button class="changeWeb Btn" data_url="{{ route('admin.business_managements.create') }}?type=friend">添加</button>
                @endcan
                @can('delete business_managements')
                    <button type="submit" class="red Btn AllDel" form="AllDel"
                            data_url="{{ url('/waso/business_managements/destory') }}">删除
                    </button>
                @endcan
            </div>
            <div class="phoneBtnOpen"></div>
        </div>
        <div class="PageBox">
            <form action="{{ route('admin.allupdate') }}" method="post" id="AllEdit" onsubmit="return false">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="table" value="business_managements">
            <table class="listTable">
                <tr>
                    <th class="tableInfoDel"><input type="checkbox" class="selectBox SelectAll"></th>
                    <th class="tableInfoDel">职位名称</th>
                    <th class="">公司网址</th>
                    <th class="">公司Logo</th>
                    <th  class="tableMoreHide">修改时间</th>
                    <th class="">发布时间</th>

                </tr>

                @forelse($friends as $friend)
                    @php $pic=json_decode($friend->pic,true);@endphp
                    <tr>
                        <td class="tableInfoDel">
                            <input class="selectBox selectIds" type="checkbox" name="id[]" value="{{ $friend->id }}">
                        </td>
                        <td class="tableInfoDel  tablePhoneShow  tableName"><a class="changeWeb"
                                                                               data_url="{{ route('admin.business_managements.edit',$friend->id) }}?type=friend">{{ $friend->field['name'] }}</a>
                        </td>
                        <td class="">{{ $friend->field['url'] }}</td>
                        <td class=""><img style="height: 50px" src="{{ $pic[0]['url'] ?? '' }}" alt=""></td>

                        <td class="tableMoreHide">{{ $friend->updated_at->format('Y-m-d') }}</td>
                        <td class="">{{ $friend->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @empty
                     <tr><td><div class='error'>没有数据</div></td></tr>
                @endforelse
            </table>
            </form>
             {{ $friends->links() }}
        </div>
    </div>

@endsection