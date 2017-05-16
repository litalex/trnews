@if (count($tags) > 0)
    <section id="pricing">
        <div class="wow zoomIn animated" data-wow-duration="400ms" data-wow-delay="0ms"
             style="visibility: visible; animation-duration: 400ms; animation-delay: 0ms; animation-name: zoomIn;">
            <ul class="pricing">
                <li class="plan-header">
                    <div class="plan-name">
                        {{ trans('base.tags') }}
                    </div>
                </li>
                <div class="panel-body">
                    <ul class="tags-list">
                        @foreach ($tags as $item)
                            <li><a class="tag-link" href="{{ $item->view_route }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </ul>
        </div>
    </section>
@endif
