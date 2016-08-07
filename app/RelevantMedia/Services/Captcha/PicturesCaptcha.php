<?php
namespace App\RelevantMedia\Services\Captcha;

class PicturesCaptcha extends AbstractCaptcha
{
    protected $animals = [
        '/captcha/animals/01.jpeg',
        '/captcha/animals/02.jpeg',
        '/captcha/animals/03.jpeg',
        '/captcha/animals/04.jpeg',
        '/captcha/animals/05.jpeg',
        '/captcha/animals/06.jpeg',
    ];

    protected $cars = [
        '/captcha/cars/01.jpeg',
        '/captcha/cars/02.jpeg',
        '/captcha/cars/03.jpeg',
        '/captcha/cars/04.jpeg',
        '/captcha/cars/05.jpeg',
        '/captcha/cars/06.jpeg',
    ];

    protected $salt = 'relevantjobs';

    /**
     * @inheritDoc
     */
    public function getCaptcha() {
        $pictures = $this->getRandomList();
        session()->put('captcha', $pictures[0]['hash']);
        shuffle($pictures);

        return view('captcha.pictures', compact('pictures'));
    }

    /**
     * @inheritDoc
     */
    public function checkCaptcha($input) {
        return $input == session()->get('captcha');
    }

    /**
     * Return random list of pictures
     * @return array
     */
    protected function getRandomList()
    {
        $randIndex = rand(0,5);
        $pictures[] = [
            'hash' => $this->getHashedValue($this->cars[$randIndex]),
            'url' => $this->cars[$randIndex],
        ];
        foreach(array_slice($this->animals, 0, 5) as $picture) {
            $pictures[] = [
                'hash' => $this->getHashedValue($picture),
                'url' => $picture,
            ];
        }
        
        return $pictures;
    }

    /**
     * Generate hash for pictures
     * @param $input
     * @return string
     */
    protected function getHashedValue($input)
    {
        return md5($input . $this->salt);
    }
}