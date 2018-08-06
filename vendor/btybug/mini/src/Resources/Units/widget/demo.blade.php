<div class="container">
    <div class="calendar light">
        <div class="calendar_header">
            <h1 class = "header_title">Welcome Back</h1>
            <p class="header_copy"> Calendar Plan</p>
        </div>
        <div class="calendar_plan">
            <div class="cl_plan">
                <div class="cl_title">Today</div>
                <div class="cl_copy">22nd  April  2018</div>
                <div class="cl_add">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div>
        <div class="calendar_events">
            <p class="ce_title">Upcoming Events</p>
            <div class="event_item">
                <div class="ei_Dot dot_active"></div>
                <div class="ei_Title">10:30 am</div>
                <div class="ei_Copy">Monday briefing with the team</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">12:00 pm</div>
                <div class="ei_Copy">Lunch for with the besties</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">13:00 pm</div>
                <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">14:30 am</div>
                <div class="ei_Copy">Plan event night to inspire students</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">15:30 am</div>
                <div class="ei_Copy">Add some more events to the calendar</div>
            </div>
        </div>
    </div>

    <div class="calendar dark">
        <div class="calendar_header">
            <h1 class = "header_title">Welcome Back</h1>
            <p class="header_copy"> Calendar Plan</p>
        </div>
        <div class="calendar_plan">
            <div class="cl_plan">
                <div class="cl_title">Today</div>
                <div class="cl_copy">22nd  April  2018</div>
                <div class="cl_add">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div>
        <div class="calendar_events">
            <p class="ce_title">Upcoming Events</p>
            <div class="event_item">
                <div class="ei_Dot dot_active"></div>
                <div class="ei_Title">10:30 am</div>
                <div class="ei_Copy">Monday briefing with the team</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">12:00 pm</div>
                <div class="ei_Copy">Lunch for with the besties</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">13:00 pm</div>
                <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">14:30 am</div>
                <div class="ei_Copy">Plan event night to inspire students</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">15:30 am</div>
                <div class="ei_Copy">Add some more events to the calendar</div>
            </div>
        </div>
    </div>

</div>
<style>
    $off_white:#fafafa;
    $light_grey:#A39D9E;
    *{
        box-sizing:border-box;
    }

    body{
        background-color: $off_white;
    }

    .container{
        margin:100px auto;
        width:809px;
    }

    .light{
        background-color: #fff;
    }
    .dark{
        margin-left: 65px;
    }

    .calendar{
        width:370px;
        box-shadow: 0px 0px 35px -16px rgba(0,0,0,0.75);
        font-family: 'Roboto', sans-serif;
        padding: 20px 30px;
        color:#363b41;
        display: inline-block;
    }

    .calendar_header{
        border-bottom: 2px solid rgba(0, 0, 0, 0.08);
    }

    .header_copy{
        color:$light_grey;
        font-size:20px;
    }
    .calendar_plan{
        margin:20px 0 40px;
    }
    .cl_plan{
        width:100%;
        height: 140px;
        background-image: linear-gradient(-222deg, #FF8494, #ffa9b7);
        box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
        padding:30px;
        color:#fff;
    }
    .cl_title{

    }
    .cl_copy{
        font-size:20px;
        margin: 20px 0;
        display: inline-block;
    }

    .cl_add{
        display: inline-block;
        width: 40px;
        height:40px;
        border-radius:50%;
        background-color: #fff;
        cursor: pointer;
        margin:0 0 0 65px;
        color:#c2c2c2;
        padding: 11px 13px;
    }
    .calendar_events{
        color:$light_grey;
    }
    .ce_title{
        font-size:14px;
    }

    .event_item{
        margin: 18px 0;
        padding:5px;
        cursor: pointer;
    &:hover{
         background-image: linear-gradient(-222deg, #FF8494, #ffa9b7);
         box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
    .ei_Dot{
        background-color: #fff;
    }
    .ei_Copy,.ei_Title{
        color:#fff;
    }
    }
    }

    .ei_Dot,.ei_Title{
        display:inline-block;
    }

    .ei_Dot{
        border-radius:50%;
        width:10px;
        height: 10px;
        background-color: $light_grey;
        box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
    }
    .dot_active{
        background-color: #FF8494;
    }

    .ei_Title{
        margin-left:10px;
        color:#363b41;
    }

    .ei_Copy{
        font-size:12px;
        margin-left:27px;
    }

    .dark{
        background-image: linear-gradient(-222deg, #646464, #454545);
        color:#fff;
    .header_title,.ei_Title,.ce_title{
        color:#fff;
    }

    }
</style>