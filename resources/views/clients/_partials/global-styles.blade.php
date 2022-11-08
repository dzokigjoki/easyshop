<link rel="stylesheet" href="/assets/global/css/toastr.min.css">
<style>
    /****** Range Slider ******/
    .irs {
        position: relative;
        display: block;
        height: 40px;
    }
    .irs-line {
        position: relative;
        display: block;
        overflow: hidden;
        height: 8px;
        top: 25px;
        background: #ccc;
        -webkit-border-radius: 5px;
        border-radius: 5px;
    }
    .irs-line-left,
    .irs-line-mid,
    .irs-line-right {
        position: absolute;
        display: block;
        top: 0;
        height: 8px;
    }
    .irs-line-left {
        left: 0;
        width: 10%;
    }
    .irs-line-mid {
        left: 10%;
        width: 10%;
    }
    .irs-line-right {
        right: 0;
        width: 10%;
    }
    .irs-diapason {
        position: absolute;
        display: block;
        left: 0;
        width: 100%;
        height: 8px;
        top: 25px;
        background: #727272;
    }
    .irs-slider {
        position: absolute;
        display: block;
        left: 0;
        width: 15px;
        height: 15px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        top: 22px;
        background: #486d97;
        -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
        box-shadow: 0 1px 3px rgba(0,0,0,0.5);
        cursor: pointer;
    }
    .irs-slider.single {
        left: 10px;
    }
    .irs-slider.single:before {
        content: '';
        position: absolute;
        display: block;
        top: -30%;
        left: -30%;
        width: 160%;
        height: 160%;
    }
    .irs-slider.from {
        left: 100px;
    }
    .irs-slider.from:before {
        content: '';
        position: absolute;
        display: block;
        top: -30%;
        left: 0;
        width: 200%;
        height: 170%;
    }
    .irs-slider.to {
        left: 300px;
    }
    .irs-slider.to:before {
        content: '';
        position: absolute;
        display: block;
        top: -30%;
        right: 0;
        width: 200%;
        height: 170%;
    }
    .irs-slider.last {
        z-index: 2;
    }
    .irs-min,
    .irs-max {
        position: absolute;
        display: block;
        cursor: default;
        color: #b3b3b3;
        font-size: 10px;
        line-height: 1.333;
        top: 4px;
    }
    .irs-min {
        left: 0;
    }
    .irs-max {
        right: 0;
    }
    .irs-from,
    .irs-to,
    .irs-single {
        position: absolute;
        display: block;
        top: 2px;
        left: 0;
        cursor: default;
        white-space: nowrap;
        color: #595959;
        font-size: 13px;
        line-height: 1.333;
    }
    .irs-grid {
        position: absolute;
        display: none;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 20px;
    }
    .irs-with-grid {
        height: 60px;
    }
    .irs-with-grid .irs-grid {
        display: block;
    }
    .irs-grid-pol {
        position: absolute;
        top: 0;
        left: 0;
        width: 1px;
        height: 8px;
        background: #b3b3b3;
    }
    .irs-grid-pol.small {
        height: 4px;
    }
    .irs-grid-text {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100px;
        white-space: nowrap;
        text-align: center;
        font-size: 9px;
        line-height: 9px;
        color: #808080;
    }
    .irs-disable-mask {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: default;
        background: #000;
        z-index: 2;
    }
    .irs-disabled {
        opacity: 0.4;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
        filter: alpha(opacity=40);
    }
    .category-sidebar-white .irs-from,
    .category-sidebar-white .irs-to,
    .category-sidebar-white .irs-single {
        color: #595959;
    }
    .category-sidebar-white .irs-min,
    .category-sidebar-white .irs-max {
        color: #8b8b8b;
    }
    /****** End of Range Slider ******/
</style>