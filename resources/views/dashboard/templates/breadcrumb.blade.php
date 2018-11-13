<ol class="breadcrumb float-sm-right">
  @foreach($breadcrumbs as $item)
    @if(!empty($item['url']))
      <li class="breadcrumb-item"><a href="{{$item['url']}}">{{$item['text']}}</a></li>
    @else
      <li class="breadcrumb-item active">{{$item['text']}}</li>
    @endif
  @endforeach
</ol>
