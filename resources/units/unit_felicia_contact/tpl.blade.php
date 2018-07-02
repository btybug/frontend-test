<section class="section-felic-contact">
        <div class="row">
            <div class="col-md-5">
                <div class="section-title text-left light-txt">
                    <h2 class="title separator text-uppercase"> Contact Us</h2>
                    <div class="sub-title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                </div>
                <div class="light-txt">
                    <h4>LOCATION</h4>
                    <p>
                        1234 City Street, Suite 300
                        San Francisco, CA 9876
                        New York <br>
                        Tel: +76 412 320 321, Fax: +76 300 200 444 <br>
                        Email: testmail@yourdomain.com
                    </p>

                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <form role="form" class="contact-form">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class=" col-md-6">
                            <div class="form-group ">
                                <input type="email" class="email form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" id="msg_subject" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <textarea id="message" rows="7" placeholder="Massage" class="form-control"></textarea>
                        </div>
                    </div>

                    <button type="submit" id="submit" class="btn">Submit</button>
                </form>
            </div>
        </div>
</section>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}