<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../views/headers/heading-results.php" ?>

<main class="container">
    <div class="row">
        <section class="column">
            <h1>Building</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Test</td>
                    <td>
                        <a title="Be ready for answers" rel="nofollow" data-method="put"
                           href="/exercises/91?exercise%5Bstatus%5D=answering"><i class="fa fa-comment"></i></a>
                        <a title="Manage fields" href="/exercises/91/fields"><i class="fa fa-edit"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="/exercises/91"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>C# Level</td>
                    <td>
                        <a title="Manage fields" href="/exercises/44/fields"><i class="fa fa-edit"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="/exercises/44"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>MinusTester</td>
                    <td>
                        <a title="Manage fields" href="/exercises/54/fields"><i class="fa fa-edit"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="/exercises/54"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>

        <section class="column">
            <h1>Answering</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>a</td>
                    <td>
                        <a title="Show results" href="/exercises/7/results"><i class="fa fa-chart-bar"></i></a>
                        <a title="Close" rel="nofollow" data-method="put"
                           href="/exercises/7?exercise%5Bstatus%5D=closed"><i class="fa fa-minus-circle"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Linux base commands</td>
                    <td>
                        <a title="Show results" href="/exercises/9/results"><i class="fa fa-chart-bar"></i></a>
                        <a title="Close" rel="nofollow" data-method="put"
                           href="/exercises/9?exercise%5Bstatus%5D=closed"><i class="fa fa-minus-circle"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>CLD2 Cloud Services</td>
                    <td>
                        <a title="Show results" href="/exercises/12/results"><i class="fa fa-chart-bar"></i></a>
                        <a title="Close" rel="nofollow" data-method="put"
                           href="/exercises/12?exercise%5Bstatus%5D=closed"><i class="fa fa-minus-circle"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>

        <section class="column">
            <h1>Closed</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Scrum Guide</td>
                    <td>
                        <a title="Show results" href="/exercises/1/results"><i class="fa fa-chart-bar"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="/exercises/1"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>1234</td>
                    <td>
                        <a title="Show results" href="/exercises/5/results"><i class="fa fa-chart-bar"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                           href="/exercises/5"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
</main>