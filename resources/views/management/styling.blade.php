<style>
    .dd-item,
    .dd-empty,
    .dd-placeholder {
        display: block;
        position: relative;
        margin: 0;
        padding: 0;
        min-height: 20px;
        font-size: 13px;
        line-height: 20px;
    }

    .menu-editor {
        display: none;
    }

    .dd-handle {
        height: unset;
        margin: 5px 0;
        padding: 14px 18px;
        color: #333;
        font-weight: bold;
        border: 1px solid #d4d4d4;
        background: #fafafa;
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        border-radius: 0px;
    }

    .dd-handle:hover {
        color: #7269ef;
        background: #fff;
    }

    .dd-item > button {
        display: block;
        position: relative;
        cursor: pointer;
        float: left;
        width: 25px;
        height: 40px;
        margin: 5px 0;
        padding: 0;
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
        border: 0;
        background: transparent;
        font-size: 12px;
        line-height: 1;
        text-align: center;
        font-weight: bold;
    }

    .dd-item > button:before {
        content: "+";
        display: block;
        position: absolute;
        width: 100%;
        text-align: center;
        text-indent: 0;
    }

    .dd-item > button[data-action="collapse"]:before {
        content: "-";
    }

    .dd-placeholder,
    .dd-empty {
        margin: 5px 0;
        padding: 0;
        min-height: 30px;
        background: #f8f8ff;
        border: 1px dashed #7269ef;
        box-sizing: border-box;
    }

    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel .dd-handle {
        box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
    }

    .button-delete {
        position: absolute;
        top: 12px;
        right: 0;
        padding: 4px 10px;
        border: unset;
        transition: 0.3s;
    }

    .button-edit {
        position: absolute;
        top: 12px;
        right: 35px;
        padding: 4px 10px;
        border: unset;
        transition: 0.3s;
        z-index: 9999;
    }

    .mainNestedMenu .button-edit:hover {
        border: unset;
        transform: scale(1.2);
        color: #7269ef !important;
    }

    .mainNestedMenu .button-delete:hover {
        border: unset;
        transform: scale(1.2);
        color: #ff3720 !important;
    }

    .mainNestedMenu .card.acc {
        min-height: unset;
        margin: 0 !important;
    }

    .mainNestedMenu .btn-default {
        background-color: unset !important;
        color: unset !important;
        box-shadow: unset !important;
    }

    .mainNestedMenu .btn-default:hover {
        background-color: unset !important;
        box-shadow: unset !important;
    }
</style>


{{--dd list--}}

<style>
    .dd-list {
        /*padding-inline-start: 0px;*/
    }

    .mainNestedMenu form {
        vertical-align: middle;
    }

    .mainNestedMenu .breadcrumb h5.page-title {
        font-size: 16px;
    }

    .mainNestedMenu .noItemsFound {
        font-size: 18px
    }

    #createMenuMain {
        display: none;
    }


    .menuDisabled::after{
        content: 'Please Choose Menu Template';
        position: absolute;
        background: #202020b8;
        color: white;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
    }
    .menuDisabled{
        user-select: none;
    }
</style>
