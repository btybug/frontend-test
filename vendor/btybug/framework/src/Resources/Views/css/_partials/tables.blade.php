<div class="d1">
    <h2>Tables</h2>
    <div class="col-md-12">
        <div class="col-md-6 p-t-34">
            <table class="bty-table">
                <thead>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Lorem 1</td>
                    <td>Lorem 2</td>
                    <td>Lorem 3</td>
                    <td>Lorem 4</td>
                    <td>Lorem 5</td>
                    <td>Lorem 6</td>
                </tr>
                <tr>
                    <td>Lorem 7</td>
                    <td>Lorem 8</td>
                    <td>Lorem 9</td>
                    <td>Lorem 10</td>
                    <td>Lorem 11</td>
                    <td>Lorem 12</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h5>bty-table</h5>
            <textarea class="form-control" name="" id="" cols="30" rows="5" readonly>
.bty-table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border-spacing: 0;
    border-collapse: collapse;
    display: table;
}

.bty-table thead {
    vertical-align: middle;
}

.bty-table > tbody > tr > td, .bty-table > tbody > tr > th, .bty-table > tfoot > tr > td, .bty-table > tfoot > tr > th, .bty-table > thead > tr > td, .bty-table > thead > tr > th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
}

.bty-table, .bty-table > tbody > tr > td, .bty-table > tbody > tr > th, .bty-table > tfoot > tr > td, .bty-table > tfoot > tr > th, .bty-table > thead > tr > td, .bty-table > thead > tr > th {
    border: 1px solid #ddd;
}

.bty-table > thead > tr {
    color: #707070;
    font-weight: 400;
    background: repeat-x #F2F2F2;
    background-image: -webkit-linear-gradient(top, #F8F8F8 0, #ECECEC 100%);
    background-image: -o-linear-gradient(top, #F8F8F8 0, #ECECEC 100%);
    background-image: linear-gradient(to bottom, #F8F8F8 0, #ECECEC 100%);
}

.bty-table > tbody > tr > td {
    vertical-align: middle;
}

.bty-table > tbody > tr > td:nth-last-child(2) p {
    margin-bottom: 0;
}

.bty-table > tbody > tr > td:first-child, .bty-table > thead > tr > th:first-child {
    text-align: center;
}
            </textarea>
        </div>

    </div>
    <div class="col-md-12">
        <h4>Active, Inactive</h4>
        <h5>bty-table-active</h5>
        <table class="bty-table bty-table-active">
            <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Lorem 1</td>
                <td>Lorem 2</td>
                <td><span class="td-inactive">Lorem 3</span></td>
                <td>Lorem 4</td>
                <td>Lorem 5</td>
                <td>Lorem 6</td>
            </tr>
            <tr>
                <td>Lorem 7</td>
                <td>Lorem 8</td>
                <td><span class="td-active">Lorem 9</span></td>
                <td>Lorem 10</td>
                <td>Lorem 11</td>
                <td>Lorem 12</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <h4>Hover</h4>
        <h5>bty-table-hover</h5>
        <table class="bty-table bty-table-hover">
            <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Lorem 1</td>
                <td>Lorem 2</td>
                <td>Lorem 3</td>
                <td>Lorem 4</td>
                <td>Lorem 5</td>
                <td>Lorem 6</td>
            </tr>
            <tr>
                <td>Lorem 7</td>
                <td>Lorem 8</td>
                <td>Lorem 9</td>
                <td>Lorem 10</td>
                <td>Lorem 11</td>
                <td>Lorem 12</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <h4>Table Striped Rows</h4>
        <h5>bty-table-striped</h5>
        <table class="bty-table bty-table-striped">
            <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Lorem 1</td>
                <td>Lorem 2</td>
                <td>Lorem 3</td>
                <td>Lorem 4</td>
                <td>Lorem 5</td>
                <td>Lorem 6</td>
            </tr>
            <tr>
                <td>Lorem 7</td>
                <td>Lorem 8</td>
                <td>Lorem 9</td>
                <td>Lorem 10</td>
                <td>Lorem 11</td>
                <td>Lorem 12</td>
            </tr>
            <tr>
                <td>Lorem 13</td>
                <td>Lorem 14</td>
                <td>Lorem 15</td>
                <td>Lorem 15</td>
                <td>Lorem 16</td>
                <td>Lorem 17</td>
            </tr>
            </tbody>
        </table>
    </div>
    <h2>Colors</h2>
    <div class="col-md-12">
        <h4>Colors Thead</h4>
        <table class="bty-table">
            <thead>
            <tr>
                <th>Color name</th>
                <th>Class</th>
                <th>Color</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Beige</td>
                <td>bty-table-th-cl-beige</td>
                <td style="background-color: beige;"></td>
            </tr>
            <tr>
                <td>LightPink</td>
                <td>bty-table-th-cl-lightpink</td>
                <td style="background-color: LightPink;"></td>
            </tr>
            <tr>
                <td>LightGray</td>
                <td>bty-table-th-cl-lightgray</td>
                <td style="background-color: Lightgray;"></td>
            </tr>
            <tr>
                <td>LightCyan</td>
                <td>bty-table-th-cl-lightcyan </td>
                <td style="background-color: LightCyan;"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <h4>Colors Body</h4>
        <table class="bty-table">
            <thead>
            <tr>
                <th>Color name</th>
                <th>Class</th>
                <th>Color</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PeachPuff</td>
                <td>bty-table-td-cl-peachpuff</td>
                <td style="background-color: PeachPuff;"></td>
            </tr>
            <tr>
                <td>MistyRose</td>
                <td>bty-table-td-cl-mistyrose</td>
                <td style="background-color: MistyRose;"></td>
            </tr>
            <tr>
                <td>LightGray</td>
                <td>bty-table-td-cl-lightgray</td>
                <td style="background-color: Lightgray;"></td>
            </tr>
            <tr>
                <td>LavenderBlush</td>
                <td>bty-table-td-cl-lavenderblush</td>
                <td style="background-color: LavenderBlush;"></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>