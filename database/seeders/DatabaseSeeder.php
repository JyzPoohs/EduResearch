<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
        $this->feedback();


        DB::table('publications')->insert([
            'id' => 1,
            'publisher_id' => 2,
            'title' => 'Analyzing Student Preferences for LLM-Generated Analogies',
            'author' => 'Seth Bernstein, Paul Denny, and Andrew Luxton-Reilly',
            'type' => 'journal',
            'date' => '2024-05-09',
            'keywords' => 'large language models, computer science education, analogies',
            'doi' => '10.1145/3649405.3659504',
            'url' => 'https://doi.org/10.1145/3649405.3659504',
            'abstract' => 'Introducing students to new concepts in computer science can often be challenging, as these concepts may differ significantly from their existing knowledge and conceptual understanding. To address this, we employed analogies to help students connect new concepts to familiar ideas. Specifically, we generated analogies using large language models (LLMs), namely ChatGPT, and used them to help students make the necessary connections.',
            'file' => 'Null',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('publications')->insert([
            'id' => 2,
            'publisher_id' => 2,
            'title' => 'Predicting Academic Performance in Computer Science Department Using Machine Learning Techniques and Analysis of Student Academic Statements',
            'author' => 'Dandu Srinivas, Nakka Venkatesh and M Prabhakar',
            'type' => 'conference',
            'date' => '2024-04-01',
            'keywords' => 'Education, Prediction, Student Performance, Machine Learning Models, Educational Analytics.',
            'doi' => 'NA',
            'url' => 'NA',
            'abstract' => 'In the realm of higher education, understanding the factors that
            contribute to academic achievement remains a significant area of research. This paper
            aims to provide insights into forecasting the educational performance of the Computer Science
            Department through the employment of machine learning techniques and analysis of student
            academic statements. The growing demand for accurate predictions regarding academic
            achievement has prompted researchers to explore novel approaches that leverage the vast
            amount of available data. By utilizing machine learning algorithms and examining student
            academic records, valuable patterns and trends can be identified, enabling accurate predictions
            and facilitating proactive measures to enhance student performance. This paper discusses the
            methodology, dataset, and results of our study, highlighting the potential benefits and
            implications of utilizing machine learning in the domain of educational forecasting.',
            'file' => '1715583512_research2.pdf',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('publications')->insert([
            'id' => 3,
            'publisher_id' => 2,
            'title' => 'Interview as a research method in teaching: a case study Interview as a research method in teaching: a case study',
            'author' => 'Jelisavka Bulatovic',
            'type' => 'article',
            'date' => '2024-03-13',
            'keywords' => 'Interview, teacher, teaching, forms of work, students.',
            'doi' => '10.36560/17320241918',
            'url' => 'https://sea.ufr.edu.br/index.php/SEA/article/view/1918',
            'abstract' => 'Although the application of modern technologies in the education system of Serbia shows signs of progress in the last few years, it is still not at a satisfactory level. Hence the demands for improvement of learning methods and means are imposed.In order to determine to what extent each form of work is represented in the teaching of informatics and computer science, we conducted an interview with teachers of informatics and computer science in elementary schools in the territory of the cities of Belgrade and Novi Sad.',
            'file' => '1715583977_research3.pdf',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('publications')->insert([
            'id' => 4,
            'publisher_id' => 3,
            'title' => 'The Impact of the COVID-19 Pandemic on the Education System: A Case Study of the Transition to Online Learning in Higher Education',
            'author' => 'John Doe',
            'type' => 'journal',
            'date' => '2024-02-01',
            'keywords' => 'COVID-19, pandemic, online learning, higher education, case study',
            'doi' => '10.1145/3649405.3659504',
            'url' => 'https://doi.org/10.1145/3649405.3659504',
            'abstract' => 'The COVID-19 pandemic has had a profound impact on the education system, prompting institutions worldwide to transition to online learning. This paper presents a case study of the transition to online learning in higher education, focusing on the challenges faced by students and educators, the strategies employed to facilitate the transition, and the outcomes of the transition. The study highlights the importance of effective communication, collaboration, and support in ensuring the success of online learning initiatives during times of crisis.',
            'file' => 'Null',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //event
        DB::table('events')->insert([
            'id' => 2,
            'user_id' => 2,
            'title' => 'Unveiling Modern Strategies for Software Reliability',
            'organizer' => 'Petakom',
            'venue' => 'DKU1',
            'date' => '2024-06-20',
            'description' => 'Exposure on testing in containerization CICD ecosytem. We invited Mr. Saiful Zahrin Bin Azmuddin from Rekamy Sdn Bhd for the sharing session. Join us at 12 p.m until 2 p.m',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('events')->insert([
            'id' => 3,
            'user_id' => 2,
            'title' => 'UMPSA Career Pit Stop 2024',
            'organizer' => 'Pusat Kerjaya',
            'venue' => 'Dewan Astaka, UMPSA Gambang',
            'date' => '2024-06-10',
            'description' => 'This is your chance to gain knowledge for your future career! Informative industrial talk by special guest, and open interview is offered! Do not miss the chance and join now! We will be there at 9 a.m until 4 p.m',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('events')->insert([
            'id' => 4,
            'user_id' => 3,
            'title' => 'The Future of Work: Strategies for Surviving the Job Market',
            'organizer' => 'Petakom',
            'venue' => 'Astaka, Faculty of Computing',
            'date' => '2024-06-01',
            'description' => 'Join the career talk with Mohd Yashim Wong, a special guest from Deriv Services, Cyberjaya. The event will start at 10 a.m until 12 p.m',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function feedback()
    {
        $datas = [
            [
                'id' => 1,
                'name' => 'dinish',
                'noKp' => '990256077825',
                'explain' => 'nice page',
                'answer' => 'Pending',
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Yattish A/L Sathya',
                'noKp' => '990617107652',
                'explain' => 'need better reports',
                'answer' => 'hi, will do that soon',
                'status' => 'Approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Dinish Kumar',
                'noKp' => '990318078297',
                'explain' => 'great page',
                'answer' => 'NULL',
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'denesh',
                'noKp' => '99034827277',
                'explain' => 'add more research papers',
                'answer' => 'will do',
                'status' => 'Approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'john doe',
                'noKp' => '990319055827',
                'explain' => 'nice page',
                'answer' => 'NULL',
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'alice',
                'noKp' => '9902884673',
                'explain' => 'good information, hope for more',
                'answer' => 'will do that soon',
                'status' => 'Approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($datas as $data) {
            DB::table('feedback')->insert($data);
        }
    }
}
