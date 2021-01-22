<?php
namespace Database\Factories;
    use App\Models\Article;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Str;
    
    class ArticleFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = \App\Models\Article::class;
       
    
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'title' => $this->faker->text(50),
                'body' => $this->faker->text(200)
            ];
        }
    }
    
