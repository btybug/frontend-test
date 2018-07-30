<script type="text/x-handlebars-template" id="bbt-editor-list">
    <ul class="bbs-field-selectors" hidden>
        {{#selectors}}
        <li data-selector="{selectorParent} {{nodeSelector}}" bbs-click="setActiveSelector">{{nodeSelector}}</li>
        {{/selectors}}
    </ul>
	<div class="container-fluid" style="float: left; width: calc(100% - 200px);height: 100%;position: relative;">
        <ul class="bbs-editor-list">{groups}</ul>
        <div class="bb-add-class-panel">
            <div class="p-2" id="element-edit-panel">
                <!-- Available Classes -->
                <div class="bb-type-panel mb-2 bb-css-add-panel" >
                     <input type="text" value="{activeClasses}" data-role="tagsinput" class="form-control elm-class-list search-classes"   />

                    <!-- <input type="text"  class="search-classes" placeholder="Search Available Classes"/> -->
                </div>
                <!-- <input type="text" value="{activeClasses}" data-role="tagsinput" class="form-control elm-class-list"   /> -->
                <div>  
                <button class="btn btn-danger css-studio-classes css-studio-add-class">Add Class</button>
                <button class="btn btn-danger css-studio-classes css-studio-custom-class" bbs-click="openClassEditor">Custom Class</button>
                </div>

                <input type="text" class="element-classes" style="display: none;"/>
            </div>
        </div>
	</div>
    <script src="http://multisite.loc/public/libs/tagsinput/bootstrap-tagsinput.min.js"></script>
</script>

<script type="template" id="bbt-properties-container">
    <li class="bbs-property-group">
        <h3 bbs-click="toggleOpen">
            {title}
            <i class="fa fa-chevron-right"></i>
        </h3>
        <div class="bbs-properties-list">{properties}</div>
    </li>
</script>

<script type="template" id="bbt-property-container">
    <div class="bbs-property-container">
        <label for="bbs-{id}">{label}</label>
        <div class="bbs-property-field">{field}</div>
    </div>
</script>

<script type="template" id="bbt-dropdown">
    <div class="bbs-dropdown-box">
        <select class="bbs-combobox" id="bbs-{id}" name="{name}">{options}</select>
    </div>
</script>

<script type="template" id="bbt-color">
    <div class="bbs-color-box">
        <input class="bbs-input bbs-color" id="bbs-{id}" name="{name}">
    </div>
</script>

<script type="template" id="bbt-number">
    <div class="bbs-number-spinner">
        <input class="bbs-input bbs-number" id="bbs-{id}" name="{name}">
    </div>
</script>

<script type="template" id="bbt-toggle">
    <div class="bbs-toggle">
        {options}
    </div>
</script>