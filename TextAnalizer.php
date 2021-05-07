<?php
    namespace app;

    // Statistical information:
    //  + Number of characters
    //  + Number of words
    //  + Number of sentences
    //  + Frequency of characters
    //  + Distribution of charactes as a percentage of total
    //  + Average word length
    //  + The average number of words in a sentence
    //  + Top 10 most used words
    //  + Top 10 longest words
    //  + Top 10 shortest words
    //  + Top 10 longest sentences
    //  + Top 10 shortest sentences
    //  + Number of palindrome words
    //  + Is the whole text a palindrome?(Without whitespaces and punctuation marks.)
    //  + The time it tooks to process the text in ms

    // + Date and time when the report was generated

    // + The reversed text

    // The calculation should work for UTF8 encoded text as well

    //require_once('commonArrayFunction');
    //require_once('commonTextFunction');

    /**
     * Class that analize text
     */
class TextAnalizer
{
    // Constant with list of separators
    const LIST_OF_SEPARATORS = [',', ';', '-', ':', '\'', '"', '(', ')', '_', '[', ']', '{',
        '}', '&', '.', '!', '?', ' '];
    // Constant that store number of items for TOP N
    const TOP_COUNT = 10;

    // Time when class was created in micro seconds
    private int $start;
    // Text to be analized
    private string $text;
    // Reversed text
    private string $reversedText;
    // Number of characters in text
    private int $numberOfCharacters;
    // Number of words in text
    private int $numberOfWords;
    // Number of sentances in text
    private int $numberOfSentances;
    // Frequensy of characters in text
    private float $frequencyOfCharacters;
    // Distribution of frequency by characters in persentage
    private array $distributionOfCharacters;
    // Avarege Length of Words in text
    private int $avaregeLengthOfWord;
    // Avarege number of words in sentance
    private int $avaregeNumberOfWordsInSentance;
    // List of words sorted by usage
    private array $wordsByUsage;
    // List of words sorted by length
    private array $wordsByLength;
    // List of sentances sorted by length
    private array $sentancesByLength;
    // Number of palindroms in text
    private int $numberOfPalindroms;
    // Is text palindrome
    private bool $isTextPalindrome;
    // Date and time when text analize was done
    private $generationDateAndTime;

    /**
     * Method for creating of class
     * @param string text
     */
    public function __construct($text)
    {
        $this->start = microtime(true);
        $this->generationDateAndTime = date('Y-m-d H:i');
        $this->text = $text;
        $this->reversedText = self::generateReversedText($text);
        $this->numberOfCharacters = self::calculateLength($text);
        $words = self::generateListOfWords($text);
        $sentances = self::generateListOfSentences($text);
        $this->numberOfWords = count($words);
        $this->numberOfSentances = count($sentances);
        $charactersString = str_replace(self::LIST_OF_SEPARATORS, '', $text);
        $this->frequencyOfCharacters = mb_strlen($charactersString)/mb_strlen($text);
        $this->setDistributionOfCharacters($charactersString);
        $this->setAvaregeLengthOfWord($words);
        $this->setAvaregeNumberOfWordsInSentances($sentances);
        $this->setWordsByLength($words);
        $this->setWordsByUsage($words);
        $this->setSentancesByLength($sentances);
        $this->setNumberOfPalindromes($words);
        $this->isTextPalindrome =  isPalindrome($charactersString);
    }

    /**
     * Generate string for echo method from data in class
     */
    public function __toString()
    {
            $result = 'TEXT ANALIZE'.PHP_EOL.PHP_EOL;
            $result .= 'TEXT: '.PHP_EOL.$this->text.PHP_EOL.PHP_EOL;
            $result .= 'REVERSED TEXT: '.PHP_EOL.$this->reversedText.PHP_EOL.PHP_EOL;
            $result .= 'Number of characters: '.$this->numberOfCharacters.PHP_EOL.PHP_EOL;
            $result .= 'Number of words: '.$this->numberOfWords.PHP_EOL.PHP_EOL;
            $result .= 'Number of sentances: '.$this->numberOfSentances.PHP_EOL.PHP_EOL;
            $result .= 'Frequency of characters: '.($this->frequencyOfCharacters*100)
                .'%'.PHP_EOL.PHP_EOL; //..
            $distributionOfCharacters = implode(PHP_EOL, array_map(
                function ($v, $k) {
                    return $k.':'.$v.'%';
                },
                $this->distributionOfCharacters,
                array_keys($this->distributionOfCharacters)
            ));
            $result .= 'Distribution of charactes as a percentage of total: '.PHP_EOL
                .$distributionOfCharacters.PHP_EOL.PHP_EOL;
            $result .= 'Average word length: '.$this->avaregeLengthOfWord.PHP_EOL.PHP_EOL;
            $result .= 'Average number of words in a sentances: '.$this->avaregeNumberOfWordsInSentance
                .PHP_EOL.PHP_EOL;
            $top10MostUsedWords =
                implode(' '.PHP_EOL, array_reverse(array_keys(array_slice(
                    $this->wordsByUsage,
                    ((-1)*self::TOP_COUNT)
                ))));
            $result .=
                'Top '.self::TOP_COUNT.' most used words: '.PHP_EOL.$top10MostUsedWords.PHP_EOL.PHP_EOL;
            $top10LongestWords =
                implode(' '.PHP_EOL, array_reverse(array_keys(array_slice(
                    $this->wordsByLength,
                    ((-1)*self::TOP_COUNT)
                ))));
            $result .=
                'Top '.self::TOP_COUNT.' longest words: '.PHP_EOL.$top10LongestWords.PHP_EOL.PHP_EOL;
            $top10ShortestWords =
                implode(' '.PHP_EOL, array_keys(array_slice($this->wordsByLength, 0, self::TOP_COUNT)));
            $result .= 'Top '.self::TOP_COUNT.' shortest words: '.PHP_EOL.$top10ShortestWords
                .PHP_EOL.PHP_EOL;
            $top10LongestSentances =
                implode(' '.PHP_EOL, array_reverse(array_keys(array_slice(
                    $this->sentancesByLength,
                    ((-1)*self::TOP_COUNT)
                ))));
            $result .=
                'Top '.self::TOP_COUNT.' longest sentences: '.PHP_EOL.$top10LongestSentances
                    .PHP_EOL.PHP_EOL;
            $top10ShortestSentances =
                implode(' '.PHP_EOL, array_keys(array_slice(
                    $this->sentancesByLength,
                    0,
                    self::TOP_COUNT
                )));
            $result .=
                'Top '.self::TOP_COUNT.' shortest sentences: '.PHP_EOL
                    .$top10ShortestSentances.PHP_EOL.PHP_EOL;
            $result .= 'Number of palindrome words: '.$this->numberOfPalindromes.PHP_EOL.PHP_EOL;
            $result .= 'Is the whole text palindrome: '.($this->isTextPalindrome?'YES':'NO')
                .PHP_EOL.PHP_EOL;
            $result .= 'Report generated: '.$this->generationDateAndTime.PHP_EOL.PHP_EOL;
            $spendedTime = (microtime(true) - $this->start)*1000;
            $result .= 'Execution time: '.$spendedTime.PHP_EOL.PHP_EOL;

            return $result;
    }

    /**
     * Calculate length of UTF-8 string
     * @param string text
     * @return int
     */
    public static function calculateLength(string $text):int
    {
        return mb_strlen($text);
    }

    /**
     * Generates reversed text
     * @param string text
     * @return int
     */
    public static function generateReversedText(string $text):string
    {
        return strrev($text);
    }

    /**
     * Generate list of words from text. Removes empty.
     * @param string text
     * @return array
     */
    public static function generateListOfWords(string $text):array
    {
        return array_filter(mb_split('\W', $text), fn($value) => !is_null($value) && $value !== '');
    }

    /**
     * Generate list of sentense.
     * @param string text
     * @return array
     */
    public static function generateListOfSentences(String $text)
    {
        $result = array_filter(mb_split('[.!?]', $text), fn($value) => !is_null($value) && $value !== '');
        foreach ($result as $key => $value) {
            $result[$key] = trim($value);
        }
        return $result;
    }

    /**
     * Set words by usage
     * @param array words
     */
    private function setWordsByUsage(array $words)
    {
        $result = [];
        foreach ($words as $word) {
            $result[$word] = (key_exists($word, $result)) ? $result[$word]+1 : 1;
        }
        $result = array_filter($result, 'strlen');
        asort($result);
        $this->wordsByUsage = $result;
    }

    /**
     * Set words by length
     * @param array words
     */
    private function setWordsByLength(array $words)
    {
        $this->wordsByLength = sortByLength($words);
    }

    /**
     * Set sentances by length
     * @param array sentances
     */
    private function setSentancesByLength(array $sentances)
    {
        $this->sentancesByLength = sortByLength($sentances);
    }

    /**
     * Set avarege length of words
     * @param array words
     */
    private function setAvaregeLengthOfWord(array $words)
    {
        $result = 0;
        $items = 0;
        foreach ($words as $word) {
            $result += mb_strlen($word);
            $items++;
        }
        $this->avaregeLengthOfWord = $result / $items;
    }

    /**
     * Set avarage number of words in sentances
     * @param array sentances
     */
    private function setAvaregeNumberOfWordsInSentances(array $sentances)
    {
        $result = 0;
        $items = 0;
        foreach ($sentances as $sentance) {
            $result += count(mb_split('\W', $sentance));
            $items++;
        }
        $this->avaregeNumberOfWordsInSentance = $result / $items;
    }

    /**
     * Calculates distribution of characters
     * @param string charactersString
     */
    private function setDistributionOfCharacters(string $charactersString)
    {
        $characters = str_split($charactersString);
        $result = [];
        $length = mb_strlen($this->text);
        foreach ($characters as $character) {
            $result[$character] = (!key_exists($character, $result)) ? 1 : $result[$character]+1;
        }
        foreach ($result as $key => $value) {
            $result[$key] = ($value*100)/$length;
        }
        ksort($result);
        $this->distributionOfCharacters = $result;
    }

    /**
    * Calculate number of palindromes
    * @param array words
    */
    private function setNumberOfPalindromes(array $words)
    {
        $result = 0;
        foreach ($words as $word) {
            if (isPalindrome($word)) {
                ++$result;
            }
        }
        $this->numberOfPalindromes = $result;
    }
}
