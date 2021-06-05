<style>
    :root {
        --bg_main: #0a1f44;
        --text_light: #fff;
        --text_gray: #e6e3e3;
        --text_med: #53627c;
        --text_dark: #1e2432;
        --red: #ff1e42;
        --darkred: #c3112d;
        --yellow: #fbff00;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-weight: normal;
    }

    button {
        cursor: pointer;
    }

    input {
        -webkit-appearance: none;
    }

    button,
    input {
        border: none;
        background: none;
        outline: none;
        color: inherit;
    }

    section {
        margin-bottom: 10px;
    }

    body {
        font: 1rem/1.3 "Roboto", sans-serif;
        background: var(--bg_main);
        color: var(--text_dark);
        padding: 50px;
    }

    /*CUSTOM VARIABLES HERE*/

    .top-banner {
        color: var(--text_light);
    }



    .heading {
        font-weight: bold;
        font-size: 4rem;
        letter-spacing: 0.02em;
        padding: 0 0 30px 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: var(--text_light);
    }

    tr:nth-child(odd) {
        background-color: var(--text_gray);
    }

    a {
        color: var(--text_light);
        font-weight: bold;
    }

    .top-banner button {
        font-size: 1rem;
        font-weight: bold;
        letter-spacing: 0.1em;
        padding: 15px 20px;
        margin-left: 15px;
        border-radius: 5px;
        background: var(--red);
        transition: background 0.3s ease-in-out;
    }

    .top-banner button:hover {
        background: var(--darkred);
    }

</style>
<section class="top-banner">
    <div class="container">
        <h1 class="heading">Cities with no weather info</h1>
        <a href='/'><button type='button'>Go Back</button></a>
    </div>
</section>
<section class="ajax-section">
    <div class="container">
        <table border="1">
            <thead>
                <tr>
                    <th>
                        <b>Cities</b>
                    </th>
                    <th>
                        <b>Last Checked Time</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>
                            {{ $city->name }}
                        </td>
                        <td>
                            {{ $city->updated_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
