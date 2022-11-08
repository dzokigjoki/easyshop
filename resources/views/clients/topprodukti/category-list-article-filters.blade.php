          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"></button>
                </div>
                 </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">{{trans('topprodukti.sort')}}:</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select class="form-control input-sm" data-sort="">
                                    <option value="created_at" {{$productFilters->selectedSort == 'created_at' ? 'selected="selected"': ''}}>{{trans('topprodukti.newest')}}</option>
                                    <option value="price-ASC" {{$productFilters->selectedSort == 'price-ASC' ? 'selected="selected"': ''}}>{{trans('topprodukti.price')}} ({{trans('topprodukti.low')}} > {{trans('topprodukti.high')}})</option>
                                    <option value="price-DESC" {{$productFilters->selectedSort == 'price-DESC' ? 'selected="selected"': ''}}>{{trans('topprodukti.price')}} ({{trans('topprodukti.high')}} > {{trans('topprodukti.low')}})</option>
                                    <option value="title-ASC" {{$productFilters->selectedSort == 'title-ASC' ? 'selected="selected"': ''}}>{{trans('topprodukti.name')}} (A - Z)</option>
                                    <option value="title-DESC" {{$productFilters->selectedSort == 'title-DESC' ? 'selected="selected"': ''}}>{{trans('topprodukti.name')}} (Z - A)</option>
                                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">{{trans('topprodukti.show')}}:</label>
              </div>
              <div class="col-sm-2 text-right">
                <select class="form-control input-sm" data-per-page="">
                                    <option value="12" {{$productFilters->limit == 12 ? 'selected="selected"': ''}}>12</option>
                                    <option value="36" {{$productFilters->limit == 36 ? 'selected="selected"': ''}}>36</option>
                                    <option value="99" {{$productFilters->limit == 99 ? 'selected="selected"': ''}}>99</option>
                                </select>
              </div>
            </div>
          </div>
          <br />