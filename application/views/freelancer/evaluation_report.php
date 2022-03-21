
<div class="container">
    <div class="white-box m-t-30">
        <div class="header-white-box">
            <div class="guidelines-wrapper">
                <h3 class="box-title m-b-0">FREELANCER EVALUATION REPORT</h3>
                <ul class="guidelines">
                    <li class="m-r-20 "><strong>4</strong> - Exceptional</li>
                    <li class="m-r-20"><strong>3</strong> - Above Average</li>
                    <li class="m-r-20"><strong>2</strong> - Average</li>
                    <li class="m-r-20"><strong>1</strong> - Needs Improvement</li>
                </ul>
            </div>
           
            <div class="button-wrapper">

                <a href="<?=base_url()?>freelancer/job_history/<?=$freelancer_id?>" title="Evaluation">
                    <button class="btn btn-primary" type="button">Back</button>
                </a>
                <button class="btn btn-primary" type="button" id="submit">Submit</button>
            </div>
          
        </div>
        <table class="table color-table inverse-table">
            <thead>
                <td style="width: 58%;">Please use the scale above to rate the worker</td>      
                <td style="width: 8%;">Rate</td>
                <td>Remarks</td>
            </thead>

            <tbody id='evaluation_report'>
               
            </tbody>
        </table>
    </div>
</div>

<style>
    .table {
        margin: 20px 0;
        background: #fff;
    }
    .table,
    .table th,
    .table td {
        border: 1px solid #e4e7ea;
    }
    .table tbody th {
        background: #2f323e;
        color: #ffffffcc;
    }
    .table tbody tr:hover td {
        background: #00000004;
    }
    .table tbody tr td {
        position: relative;
    }
    .table tbody td select {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100%;
        text-align: center;
    }
    .table tbody td select,
    .table tbody td textarea {
        border: 0;
        resize: none;
        overflow: hidden;
    }
    .table tbody tr td > div::after {
        position: relative;
        content: attr(data-replicated-value) " ";
        white-space: pre-wrap;
        visibility: hidden;
    }
    .table tbody tr td > div > textarea,
    .table tbody tr td > div::after {
        font: inherit;
        grid-area: 1 / 1 / 2 / 2;
    }
    thead {
        background-color: #00000008;
    }
    .guidelines {
        display: flex;
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 15px;
    }
    .header-white-box {
        display: flex;
        justify-content: space-between;
}
</style>

<script>
    const freelancer_id = '<?php echo $freelancer_id; ?>';
</script>
<script type="text/javascript" src="<?=base_url()?>asset/src/freelancer/evaluation_report.js"></script>