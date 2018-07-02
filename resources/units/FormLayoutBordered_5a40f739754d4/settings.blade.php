<style>
    .panel{
        color: #000000!important;
    }

    .bg-primary{
        padding: 2px;
        text-indent: 5px;
    }

    .input-hidden {
        position: absolute;
        left: -9999px;
    }
    input[type=radio] + label>img{
        border: 3px solid transparent;
    }

    input[type=radio]:checked + label>img{
        border-color: #168cba;
    }
</style>

<div class="panel panel-default" style="margin-top: 15px;">
    <div class="panel-heading">General Settings</div>
    <div class="panel-body">
        <!-- Content -->
        <p class="bg-primary">Content</p>
        <div class="form-group">
            <label for="">Main Title</label>
            <input type="text" name="main_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Sub Title</label>
            <input type="text" name="sub_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Button Text</label>
            <input type="text" name="button_text" class="form-control">
        </div>

        <!-- Style -->
        <p class="bg-primary">Style</p>
        <div class="form-group">
            <label for="">Main form background</label>
            <select name="main_background" class="form-control">
                <option value="gray">Gray Background</option>
                <option value="dark">Dark Background</option>
                <option value="colorful">Colorful Background</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Button background</label>
            <select name="button_background" class="form-control">
                <option value="blue">Blue Background</option>
                <option value="yellow">Yellow Background</option>
                <option value="red">Red Background</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Button Style</label>
            <select name="button_style" class="form-control">
                <option value="rounded">Rounded Button</option>
                <option value="square">Square Button</option>
            </select>
        </div>
    </div>
</div>