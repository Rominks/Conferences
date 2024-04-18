<div class="form-group">
    <label for="title">{{ __('app.article_model.title') }}</label>
    <input type="text" class="form-control" id="{{"title" . optional($article ?? "")->id}}" name="title" value="{{ optional($article ?? null)->title }}">
    <div class="error_title"></div>
</div>
<div class="form-group">
    <label for="address">{{ __('app.article_model.address') }}</label>
    <input type="text" class="form-control" id="{{"address" . optional($article ?? "")->id}}" name="address" value="{{ optional($article ?? null)->address }}">
    <div class="error_address"></div>
</div>
<div class="form-group">
    <label for="attendance">{{ __('app.article_model.attendance') }}</label>
    <input type="text" class="form-control" id="{{"attendance" . optional($article ?? "")->id}}" name="attendance" value="{{ optional($article ?? null)->attendance }}">
    <div class="error_attendance"></div>
</div>
<div class="form-group">
    <label for="content">{{ __('app.article_model.content') }}</label>
    <textarea class="form-control" id="{{"content" . optional($article ?? "")->id}}" name="content">{{ optional($article ?? null)->content }}</textarea>
    <div class="error_content"></div>
</div>
<div class="form-group">
    <label for="flatpickr-date">{{ __('app.article_model.date') }}</label>
    <input type="text" id="{{"flatpickr-date" . optional($article ?? "")->id}}" class="flatpickr flatpickr-calendar" value="{{ optional($article ?? null)->dateTime }}">
    <div class="error_date"></div>
</div>

