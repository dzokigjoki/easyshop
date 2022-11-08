<div class="tab-pane" id="tab_images">
    <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-info blue">
            <i class="fa fa-plus"></i> Избери слики </a>
        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-info blue">
            <i class="fa fa-share"></i> Прикачи </a>
    </div>
    <div class="row">
        <div id="tab_images_uploader_filelist" class="col-sm-12"> </div>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr role="row" class="heading">
            <th width="25%"> Слика </th>
            <th width="25%"> Наслов </th>
            <th width="25%"> Редослед </th>
            <th width="25%"> Акции </th>
        </tr>
        </thead>
        <tbody>
        @foreach($galery_images as $img)
            <tr id="image_row_{{$img->id}}">
                <td>
                    <a href="{{URL::to('uploads/products/')}}/{{$product_id}}/{{$img->filename}}" class="fancybox-button" data-rel="fancybox-button">
                        <img class="img-responsive" src="{{URL::to('uploads/products/')}}/{{$product_id}}/lg_{{$img->filename}}" alt=""> </a>
                </td>
                <td>
                    <input type="text" class="form-control" name="galery[{{$img->id}}][label]" value="{{$img->label}}">
                </td>
                <td>
                    <input type="text" class="form-control" name="galery[{{$img->id}}][sort_order]" value="{{$img->sort_order}}">
                </td>
                <td>
                    <span id="image_{{$img->id}}" class="btn btn-default btn-sm remove_image">
                        <i class="fa fa-times"></i> Избриши </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>