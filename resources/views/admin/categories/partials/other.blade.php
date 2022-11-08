{{-- Other --}}
<h3 class="form-section" style="border-bottom: 1px solid #E7ECF1;">Останато</h3>

<div class="row">

    <div class="col-md-12">
        {{-- Active --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Активна</label>

            <div class="col-md-9">
                <input name="active" type="checkbox" class="make-switch"
                       data-on-text="Да" data-off-text="Не"
                       value="1" @if(old('active', $category->active) == 1) checked  @endif />
            </div>
        </div>
        {{-- // Active --}}
    </div>

    <div class="col-md-12">
        {{-- In Main Menu --}}
        <div class="form-group">
            <label class="col-md-3 control-label">Во Главно Мени</label>

            <div class="col-md-9">
                <input name="main_category" type="checkbox" class="make-switch"
                       data-on-text="Да" data-off-text="Не"
                       @if(old('main_category', $category->main_category) == 1) checked  @endif
                       value="1"/>
            </div>
        </div>
        {{-- // In Main Menu --}}
    </div>

</div>
{{-- // Other --}}