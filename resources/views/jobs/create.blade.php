@extends('layouts.app')

@section('content')

        <section class="container">
            <form class="form">

                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <label for="company_name" class="form__label">Company Name:</label>
                        <input type="text" name="company_name" id="company_name" class="form__input" placeholder='Amazon'/>
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <label for="job_title" class="form__label">Job Title:</label>
                        <input type="text" name="job_title" id="job_title" class="form__input" placeholder="Developer" />
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <label for="email" class="form__label">Contact Email:</label>
                        <input type="text" name="email" id="company_email" class="form__input" placeholder="" />
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <label for="address" class="form__label">Address:</label>
                        <input type="text" name="address" id="address" class="form__input" placeholder="123 Fake Street" />
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <label for="description" class="form__label">Job Description:</label>
                        <textarea cols="80" rows="8" name="description" id="description"></textarea>
                    </div>
                </div>

                <div>
                    <input type="submit" value="Submit" />
                    <div class="clr"></div>
                </div>
            </form>
        </section>

@endsection
