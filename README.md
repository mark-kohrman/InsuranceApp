# Insurance App

This is a project for a Dealer Inspire PHP Developer job application process.

The project took a CSV file with Insurance policy data and converted it to a JSON file that shows the aggregate Total Insurable Value in 2012 by county.

The output.json file (which is the answer for this challenge) is saved in the following directory:
InsuranceApp/src/Policy/FileData/output.json

The output.json file is run in the App's Processor in InsuranceApp/src/Policy/Processor.php and running `php Processor.php` in the `Policy` directory will get a file sent to the `FileData` directory if the same file name isn't in there.

You can also change the year in the Processor by adding it as a string argument to the method `processTivData` on the last line. The current data set only has TIV for 2012 and 2011 and only 2012 was requested in the requirements for this project.

I didn't have time to write a lot of tests, but set up one and more can be written in the tests directory. Tests can be run with the following command in the root directory: `./vendor/bin/phpunit tests`

I enjoyed making this app and feel free to reach out with any questions!

## Authors

- [@mark-kohrman](https://www.github.com/mark-kohrman)
