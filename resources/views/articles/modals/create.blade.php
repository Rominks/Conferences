<div class="modal" id="createArticleModal">
    <a class="modal-overlay modal-close" aria-label="Close"></a>
    <div class="modal-container">
        <div class="modal-header">
            <a class="btn btn-clear close-modal float-right modal-close" aria-label="Close"></a>
            <div class="modal-title h5">{{__('app.create_article')}}</div>
        </div>
        <div class="modal-body">
            <div class="content">
                <form id="article-form" action="/articles/submit" method="POST">
                    @include('articles.partials.form')
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="modal-create-btn" form="article-form" class="btn btn-primary">{{ __('app.submit') }}</button>
        </div>
    </div>
</div>
