<div class="modal" id="articleModal">
    <a class="modal-overlay modal-close" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a class="btn btn-clear close-modal float-right modal-close" aria-label="Close"></a>
            <div class="modal-title h5">{{__('app.edit_article')}}</div>
        </div>
        <div class="modal-body">
            <div class="content">
                <form id="article-form" action="/articles/update/{{ $article->id }}" method="POST">
                    @include('articles.partials.form')
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="modal-submit-btn" form="article-form" class="btn btn-primary">{{ __('app.submit') }}</button>
        </div>
    </div>
</div>
