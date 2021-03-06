@extends('layouts.merchant')
@section('content')
<div id="content-header" class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Merchant Discounts</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;"><i class="ion ion-pricetags"></i> Discounts</a></li>
            <li class="active">Create New Discount</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
        <div class="panel-heading">Create New Discount&nbsp;</div>        
        <div class="panel-body">
            <form id="form-create-discount" method="post" action="/discount">            	
                <div id="create-discount-success" class="alert alert-success alert-dismissable" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Success!</strong> New Discount has been created
                </div>
            <div class="table-responsive">
                <table class="table">
	                <tr>
	                    <td style="vertical-align:middle;width:180px;"><label>Title</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_title"></label>
	                            <input id="discount_title" name="discount_title" class="form-control"/>
	                        </div>
	                    </td>
	                </tr>
	                <tr>
	                    <td style="vertical-align:middle;"><label>Type</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_type"></label>
	                            <select id="discount_type" name="discount_type" class="form-control">
	                            	<option value="">Select Discount Type</option>
	                            	<option value="price">By Price</option>
	                            	<option value="rate">By Percentage</option>
                        		</select>
	                        </div>
	                    </td>
	                </tr>
	                <tr id="discount-price-input" class="discount-type-input" style="display:none;">
	                    <td style="vertical-align:middle;"><label>Discount Price</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_price"></label>
	                            <input id="discount_price" name="discount_price" class="form-control"/>
	                        </div>
	                    </td>
	                </tr>
	                <tr id="discount-rate-input" class="discount-type-input" style="display:none;">
	                    <td style="vertical-align:middle;"><label>Discount Rate</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_rate"></label>
	                            <input id="discount_rate" name="discount_rate" class="form-control"/>
	                        </div>
	                    </td>
	                </tr>
	                <tr>
	                    <td style="vertical-align:middle;"><label>Discount Date</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_date"></label>
	                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="discount_date" name="discount_date" class="form-control pull-right" readonly style="cursor:pointer;"/>
                                    <input type="hidden" id="discount_start" name="discount_start" value=""/>
            						<input type="hidden" id="discount_end" name="discount_end" value=""/>
                                </div>
	                        </div>
	                    </td>
	                </tr>	                
	                <tr>
	                    <td style="vertical-align:middle;"><label>Description</label></td>
	                    <td>
	                        <div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_description"></label>
	                            <textarea id="discount_description" name="discount_description" class="form-control" rows="3" style="resize:none;height:120px;"></textarea>
	                        </div>
	                    </td>
	                </tr>
	                <tr>
	                    <td style="vertical-align:middle;"><label>Discount Image</label></td>
	                    <td>
	                    	<div class="form-group" style="margin:0px;">
	                            <label style="display:none;" class="control-label" for="discount_image"></label>
	                            <input type="hidden" id="discount_image" name="discount_image" value=""/>
	                        </div>
	                        <div style="margin-bottom:10px;position:relative;">
	                            <span class="btn btn-success btn-sm fileinput-button"><i class="glyphicon glyphicon-plus"></i><span>Upload an image...</span>
									<input id="upload_discount_image" type="file" name="files[]" data-url="<?=URL::to('/upload/discount')?>" style="cursor:pointer;">
								</span>
							</div>
                            <div id="fileupload-progress" class="progress" style="display:none;"><div class="progress-bar progress-bar-success"></div></div>
	                        <table id="uploaded_images" role="presentation" class="table table-striped"></table>
	                    </td>
	                </tr>


                	<tr><td colspan="2" style="text-align:center;"><button type="submit" class="btn btn-primary">Create New Discount</button></td></tr>
                </table>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop

@section('header-css')
<link rel="stylesheet" type="text/css" href="/assets/css/daterangepicker/daterangepicker-bs3.css">
@stop
@section('footer-js')
<script src="/assets/js/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.iframe-transport.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-process.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-validate.js"></script>
<script src="/assets/js/plugins/JQueryFileUpload/jquery.fileupload-ui.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/assets/js/plugins/JQueryFileUpload/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<script src="/assets/js/fileupload.js"></script>
<script type="text/javascript">
window.bc_merchant.init_datepicker();

$('#discount_type').change(function(){
	
	$('.discount-type-input').hide();

	var type = $(this).val();
	if(type == 'price') $('#discount-price-input').show();
	if(type == 'rate') $('#discount-rate-input').show();
});
</script>
@stop