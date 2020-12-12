<!-- Compressed version is located at js/teacher-add-questions.js-->
<?php include '../functionalphp/main-head.php';?>

<div class='container-fluid p-3 bg-white border question1'>
    <script>
        $(document).ready(function() {
            $('#question1-type').change(function() {
                console.log($('#question1-type option:selected').val());
                if($('#question1-type option:selected').val() == 1)
                {
                    $('.question1-tfq').hide();
                    $('.question1-mcq').show();
                    $('.question1-fbq').hide();
                }
                else if ($('#question1-type option:selected').val() == 2)
                {
                    $('.question1-mcq').hide();
                    $('.question1-tfq').show();
                    $('.question1-fbq').hide();
                }
                else if ($('#question1-type option:selected').val() == 3)
                {
                    $('.question1-tfq').hide();
                    $('.question1-mcq').hide();
                    $('.question1-fbq').hide();
                }
                else
                {
                    $('.question1-tfq').hide();
                    $('.question1-mcq').hide();
                    $('.question1-fbq').show();
                }
            });
        });
    </script>
    <h5 id='question1'>Question 1</h5>
    <form role='form'>
        <div class='form-group'>
            <label>Question:</label>
            <textarea class='form-control' id='question1-q' name='question1-q' rows='3'></textarea>
            <div class='question1-fbq' style='display: none;'>
                <label>Use __BLANK__ to create a blank for students to input.</label>
            </div>
        </div>
        <div class='form-row form-group'>
            <div class='col'>
                <label>Question-type</label>
                <select class='form-control' id='question1-type' name='question1-type'>
                <option value='1'>Multiple Choice</option>
                <option value='2'>TRUE or FALSE</option>
                <option value='3'>Short answer</option>
                <option value='4'>Fill in the blank</option>
             </select>
            </div>
            <div class='col'>
                <label>Score</label>
                <input type='number' class='form-control' placeholder='' id='question1-score' name='question1-score' min='0' max='1000' required />
            </div>
        </div>
        <div class='question1-mcq'>
            <div class='form-row form-group'>
                <div class='col'>
                    <label>1st Choice</label>
                    <input type='text' class='form-control' placeholder='' id='question1-mc-choice1' name='question1-mc-choice1' />
                </div>
                <div class='col'>
                    <label>2nd Choice</label>
                    <input type='text' class='form-control' placeholder='' id='question1-mc-choice2' name='question1-mc-choice2' />
                </div>
            </div>
            <div class='form-row form-group'>
                <div class='col'>
                    <label>3rd Choice</label>
                    <input type='text' class='form-control' placeholder='' id='question1-mc-choice3' name='question1-mc-choice3' />
                </div>
                <div class='col'>
                    <label>4th Choice</label>
                    <input type='text' class='form-control' placeholder='' id='question1-mc-choice4' name='question1-mc-choice4' />
                </div>
            </div>
            <div class='form-group'>
                <label>Correct Answer for MC Question</label>
                <select class='form-control' id='question1-mcq-correct' name='question1-mcq-correct'>
                <option value='1'>1st Choice</option>
                <option value='2'>2nd Choice</option>
                <option value='3'>3rd Choice</option>
                <option value='4'>4th Choice</option>
             </select>
            </div>
        </div>
        <div class='question1-tfq' style='display: none;'>
            <div class='form-group'>
                <label>Correct Answer for TF Question</label>
                <select class='form-control' id='question1-tfq-correct' name='question1-tfq-correct'>
                <option value='1'>TRUE</option>
                <option value='0'>FALSE</option>
             </select>
            </div>
        </div>
    </form>
</div>
<br>