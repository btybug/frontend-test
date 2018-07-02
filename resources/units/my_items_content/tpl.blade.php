<section class="myaccount-about-all">
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Studio Type</th>
                    <th>Css Data</th>
                    <th>Html Data</th>
                    <th>Json Data</th>
                    <th>Adiational Data</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Nice button</td>
                    <td>Button Studio</td>
                    <td>.nice-button{nice:100%}</td>
                    <td>{!! "<button class='nice-button'></button>" !!}</td>
                    <td>{'nice-button':{'nice':'100%'}}</td>
                    <td></td>
                    <td>Actions</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>


{!! BBstyle($_this->path.DS.'css'.DS.'styles.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'popper'.DS.'popper.min.js',$_this) !!}