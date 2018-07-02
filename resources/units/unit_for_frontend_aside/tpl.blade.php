<div class="sidebar">
    <div class="side-bar-search">
        <div class="head">
            <h3>Search</h3>
        </div>
        <div class="serach-bar">
            <form action="#" method="get">
                <input type="text" class="" placeholder="Type Your Word">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="categories">
        <div class="head">
            <h3>Categories</h3>
        </div>
        <div class="categories-list">
            <ul class="categories-list-item">
                <li><a href="#">Design</a></li>
                <li><a href="#">Template</a></li>
                <li><a href="#">Photography</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">Graphics</a></li>
            </ul>
        </div>
    </div>
    <div class="about-me">
        <div class="head">
            <h3>Info</h3>
        </div>
        <div class="about-pic">
            <img src="https://cdn-s3.si.com/s3fs-public/images/Tiffani-Thiessen--getty14.jpg" alt="image">
        </div>
        <div class="about-text">
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, at, cupiditate dicta earum eum ex explicabo labore laboriosam laborum molestias obcaecati officiis perferendis quam quas sed tenetur unde veniam, vitae.</p>
        </div>
    </div>
    <div class="newsletter">
        <div class="head">
            <h3>Subscribe Now</h3>
            <p>Subscribe to our newsletter.</p>
        </div>
        <div class="serach-bar">
            <form action="#" method="get">
                <input type="text" class="" placeholder="Email">
            </form>
        </div>
        <div class="send">
            <button type="submit" value="Submit">Send Now</button>
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}