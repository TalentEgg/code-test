@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">TalentEgg Code Test Instructions</div>

                <div class="card-body">
                    <p>You will build an admin application to manage jobs which includes front-end, back-end along with database.</p>

                    <h5>Requirements:</h5>
                    <ul>
                        <li>Create a <code>Job</code> model</li>
                        <li>Be able to add, edit, delete and list all jobs</li>
                        <li>Be able to add, edit, delete and list all jobs</li>
                    </ul>

                    <hr />

                    <h5>Note:</h5>
                    <p>You can begin by searching <code>NOTE</code> and <code>TODO</code> comments in the code.</p>
                    <p>Feel free to modify any part of the code (creating/modifying/deleting  new controllers, views, models, or any file you think is needed to fulfill the requirements).</p>
                    <p>Feel free to implement any kind of approach for this assessment (you can use API oriented design, static pages only, etc).</p>
                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header">Submission</div>
                <div class="card-body">
                    <ol>
                        <li>Make sure to include your name and email in <code>README.md</code>.</li>
                        <li>If you have a Github account, submit by forking and creating a pull request.</li>
                        <li>If you don't have a Github account, you can submit it via email or send us a link to public storage like Google Drive, Dropbox, etc.</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Questions?</div>

                <div class="card-body">
                    <p>If you have any questions or need technical clarifications, feel free to contact <a href="mailto:mark@talentegg.ca">mark@talentegg.ca</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
