<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hidaya | Portfolio</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f7fc;
            color: #333;
        }

        /* ===== NAVBAR ===== */

        header {
            background-color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #7b5cff;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin-left: 25px;
            font-weight: 500;
        }

        nav a:hover {
            color: #7b5cff;
        }

        /* ===== HOME ===== */

        .home {
            min-height: 90vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 60px 10%;
            gap: 50px;
        }

        .home-text {
            max-width: 600px;
        }

        .home-text h1 {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .home-text h1 span {
            color: #7b5cff;
        }

        .home-text h2 {
            font-size: 25px;
            margin-bottom: 20px;
            color: #555;
        }

        .home-text p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
            color: #666;
        }

        .btn {
            display: inline-block;
            background-color: #7b5cff;
            color: white;
            padding: 13px 25px;
            border-radius: 8px;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #6043d8;
        }

        .btn-outline {
            background-color: transparent;
            color: #7b5cff;
            border: 2px solid #7b5cff;
        }

        .btn-outline:hover {
            background-color: #7b5cff;
            color: white;
        }

        .profile {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background-color: #e9e3ff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 80px;
            color: #7b5cff;
        }

        /* ===== SECTIONS ===== */

        section {
            padding: 80px 10%;
        }

        .section-title {
            text-align: center;
            font-size: 35px;
            margin-bottom: 45px;
            color: #333;
        }

        .section-title span {
            color: #7b5cff;
        }

        /* ===== ABOUT ===== */

        .about {
            background-color: white;
            text-align: center;
        }

        .about p {
            max-width: 800px;
            margin: auto;
            font-size: 18px;
            line-height: 1.8;
            color: #666;
        }

        /* ===== SKILLS ===== */

        .skills-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .skill {
            background-color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .skill h3 {
            color: #7b5cff;
            margin-bottom: 10px;
        }

        .skill p {
            color: #666;
        }

        /* ===== PROJECTS ===== */

        .projects {
            background-color: white;
        }

        .projects-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .project {
            background-color: #f8f7fc;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #eee;
        }

        .project h3 {
            color: #7b5cff;
            margin-bottom: 12px;
        }

        .project p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .project a {
            color: #7b5cff;
            text-decoration: none;
            font-weight: bold;
        }

        /* ===== CONTACT ===== */

        .contact {
            text-align: center;
        }

        .contact p {
            font-size: 18px;
            margin-bottom: 15px;
            color: #666;
        }

        .contact a {
            color: #7b5cff;
            text-decoration: none;
        }

        /* ===== FOOTER ===== */

        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 25px;
        }

        /* ===== RESPONSIVE ===== */

        @media (max-width: 900px) {

            .home {
                flex-direction: column;
                text-align: center;
            }

            .skills-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .projects-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            header {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 5px;
            }

            .home-text h1 {
                font-size: 38px;
            }

            .skills-container {
                grid-template-columns: 1fr;
            }

            .profile {
                width: 200px;
                height: 200px;
                font-size: 60px;
            }
        }
    </style>
</head>

<body>

    <!-- ===== NAVBAR ===== -->

    <header>

        <div class="logo">
            Hidaya
        </div>

        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

    </header>


    <!-- ===== HOME ===== -->

    <section class="home" id="home">

        <div class="home-text">

            <h1>
                Hi, I'm <span>Hidaya</span>
            </h1>

            <h2>
                Digital Development Student
            </h2>

            <p>
                I am a passionate student in Digital Development.
                I enjoy creating websites and learning new technologies.
                My goal is to become a professional software engineer.
            </p>

            <a href="#projects" class="btn">
                My Projects
            </a>

            <a href="#contact" class="btn btn-outline">
                Contact Me
            </a>

        </div>


        <div class="profile">
            H
        </div>

    </section>


    <!-- ===== ABOUT ===== -->

    <section class="about" id="about">

        <h2 class="section-title">
            About <span>Me</span>
        </h2>

        <p>
            My name is Hidaya. I am a Digital Development student
            interested in web development, programming and databases.
            I am currently improving my skills in HTML, CSS, JavaScript,
            PHP, Python and SQL. I enjoy learning through practical
            projects and discovering new technologies.
        </p>

    </section>


    <!-- ===== SKILLS ===== -->

    <section id="skills">

        <h2 class="section-title">
            My <span>Skills</span>
        </h2>

        <div class="skills-container">

            <div class="skill">
                <h3>HTML</h3>
                <p>Creating structured web pages.</p>
            </div>

            <div class="skill">
                <h3>CSS</h3>
                <p>Designing modern and responsive websites.</p>
            </div>

            <div class="skill">
                <h3>JavaScript</h3>
                <p>Adding interaction to websites.</p>
            </div>

            <div class="skill">
                <h3>PHP</h3>
                <p>Developing dynamic web applications.</p>
            </div>

            <div class="skill">
                <h3>Python</h3>
                <p>Programming and application development.</p>
            </div>

            <div class="skill">
                <h3>SQL</h3>
                <p>Managing and working with databases.</p>
            </div>

            <div class="skill">
                <h3>UML</h3>
                <p>Designing and analyzing applications.</p>
            </div>

            <div class="skill">
                <h3>Git</h3>
                <p>Managing and tracking project versions.</p>
            </div>

        </div>

    </section>


    <!-- ===== PROJECTS ===== -->

    <section class="projects" id="projects">

        <h2 class="section-title">
            My <span>Projects</span>
        </h2>

        <div class="projects-container">

            <div class="project">

                <h3>Portfolio Website</h3>

                <p>
                    A personal portfolio website created with
                    HTML and CSS to present my skills and projects.
                </p>

                <a href="#">View Project →</a>

            </div>


            <div class="project">

                <h3>Product Management</h3>

                <p>
                    A web application for managing products,
                    categories and information using PHP and SQL.
                </p>

                <a href="#">View Project →</a>

            </div>


            <div class="project">

                <h3>Web Application</h3>

                <p>
                    A practical web development project using
                    HTML, CSS, JavaScript and PHP.
                </p>

                <a href="#">View Project →</a>

            </div>

        </div>

    </section>


    <!-- ===== CONTACT ===== -->

    <section class="contact" id="contact">

        <h2 class="section-title">
            Contact <span>Me</span>
        </h2>

        <p>
            If you want to contact me, feel free to send me an email.
        </p>

        <p>
            Email:
            <a href="mailto:your@email.com">
                your@email.com
            </a>
        </p>

        <p>
            LinkedIn:
            <a href="#">
                My LinkedIn
            </a>
        </p>

    </section>


    <!-- ===== FOOTER ===== -->

    <footer>

        <p>
            © 2026 Hidaya. All Rights Reserved.
        </p>

    </footer>

</body>
</html>