freelancerEvaluationReport();

let  evaluations = [
    {
        title: 'QUALITY OF WORK',
        questions: [{
            name: 'Knowledgeable of the tasks assigned',
            rate: null,
            remarks: null,
        },
        {
            name: 'Deals with tasks efficiently',
            rate: null, 
            remarks: null,
        },
        {
            name: 'Able to finish the task without rework',
            rate: null,
            remarks: null,
        }]
    }, {
        title: 'WORK HABITS',
        questions: [{
            name: 'Seeks clarrification if necessary',
            rate: null,
            remarks: null,
        },
        {
            name: 'Able to follow instructions and procedures',
            rate: null,
            remarks: null,
        },
        {
            name: 'Able to improve and accept ideas',
            rate: null,
            remarks: null,
        },
        {
            name: 'Follows safety rules and procedures',
            rate: null,
            remarks: null,
        }]
    }, {
        title: 'PROFESSIONALISM',
        questions: [{
            name: 'Attends work regularly',
            rate: null,
            remarks: null,
        },
        {
            name: 'Arrives to work on time',
            rate: null,
            remarks: null,
        },
        {
            name: 'Resumes work from breaks on time',
            rate: null,
            remarks: null,
        }]
    }, {
        title: 'HUMAN RELATIONS',
        questions: [{
            name: 'Contributes to team efforts',
            rate: null,
            remarks: null,
        },
        {
            name: 'Accepts feedback and responds appropriately',
            rate: null,
            remarks: null,
        },
        {
            name: 'Talks to the supervisor or team leader when there are issues',
            rate: null,
            remarks: null,
        },
        {
            name: 'Is a good team player',
            rate: null,
            remarks: null,
        }]
    }, 

];

async function freelancerEvaluationReport() {
    const tableEvaluation = document.getElementById('evaluation_report');

    const res = await fetch(`${CONFIG.BASE_URL}freelancer/get_evaluation_report/${freelancer_id}`);
    const result = await res.json();
    
    if (result) {
        evaluations = JSON.parse(result.evaluation_report_data);
    } 
    document.getElementById('submit').disabled = result?.freelancer_role_id != 1;

    tableEvaluation.innerHTML = evaluations.map((group, groupIndex) => (`
            <tr>     
            </tr><th colspan="3">${group.title}</th>
            ${group.questions.map((question, questionIndex) => (`
                <tr>
                    <td>${question.name}</td>
                    <td class="p-0">
                        <strong>
                            <select class="form-control rating-input" ${result?.freelancer_role_id != 1 ? 'disabled' : ''} data-group-index="${groupIndex}" data-question-index="${questionIndex}">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        <strong>
                    </td>
                    <td class="p-0">
                        <div style="display: grid;">
                            <textarea class="form-control textArea" ${result?.freelancer_role_id != 1 ? 'disabled' : ''} placeholder="Remarks..." data-group-index="${groupIndex}" data-question-index="${questionIndex}">${question.remarks || ''}</textarea>
                        </div>
                    </td>
                </tr>
            `))
            .join('')
            }
        `))
        .join('');

    Array.from( document.getElementsByClassName('textArea') )
        .forEach(elem => {
            elem.addEventListener('input', (e) => {
                e.target.parentNode.dataset.replicatedValue = e.target.value;
                const { value } = e.target;
                const { groupIndex, questionIndex } = e.target.dataset;
                evaluations[groupIndex]['questions'][questionIndex].remarks = value;
            });
        });

    Array.from( document.getElementsByClassName('rating-input') )
        .forEach((elem) => {
            const { groupIndex, questionIndex } = elem.dataset;
            elem.value = evaluations[groupIndex]['questions'][questionIndex].rate;
        });

    Array.from( document.getElementsByClassName('rating-input') )
        .forEach((elem) => {
            elem.addEventListener('change', function(e) {
                const { value } = e.target;
                const { groupIndex, questionIndex } = e.target.dataset;
                evaluations[groupIndex]['questions'][questionIndex].rate = value;
            });
        });
}

document.getElementById('submit').addEventListener('click', async () => {
    const formData = new FormData();
    formData.append('evaluation_report_data', JSON.stringify(evaluations));
    const res = await fetch(`${CONFIG.BASE_URL}freelancer/store_evaluation_report/${freelancer_id}`, {
        method: 'POST',
        body: formData,
    });
    const result = await res.json();
    alertify.logPosition("bottom right");
    if (result.success) {
        alertify.success("Successfully submitted!");
        freelancerEvaluationReport();
    }
});



