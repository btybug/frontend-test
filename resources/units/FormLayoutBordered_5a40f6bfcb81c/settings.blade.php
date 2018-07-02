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
        <!-- Style -->
        <p class="bg-primary">Style</p>
        <div class="form-group">
            <label for="">Select Theme</label>
            <select name="general_theme" class="form-control">
                <option value="">Light Theme</option>
                <option value="dark-theme">Dark Theme</option>
                <option value="colorfull">Colorful Theme</option>
            </select>
        </div>
    </div>
</div>