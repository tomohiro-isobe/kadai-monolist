@if ($items)
    <div class="row">
        @foreach ($items as $key => $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($item->id && Auth::check())
                                <p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></p>
                            @else
                                <p class="item-title"><a href="{{ route('login.get') }}">{{ $item->name }}</a></p>
                            @endif
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('items.want_button', ['item' => $item])
                                    
                                    @include('items.have_button', ['item' => $item])
                                @endif
                                
                            </div>
                        </div>
                        @if (isset($item->count))
                            <div class="panel-footer">
                                <p class="text-center">{{ $key+1 }}位: {{ $item->count }} Wants</p>
                            </div>
                        @endif
                        
                        @if (isset($item->countHave))
                            <div class="panel-footer">
                                <p class="text-center">{{ $key+1 }}位: {{ $item->countHave }} Haves</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif