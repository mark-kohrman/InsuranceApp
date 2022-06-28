# InsuranceApp
Coding project used to demonstrate my ability in PHP.

The project took a CSV file (File Path: InsuranceApp/src/Policy/FileData/FL_insurance_sample.csv) with Insurance policy data and converted it to a JSON file that shows the aggregate Total Insurable Value (TIV) in 2012 by county.

The output.json file (the expected output file for this exercise) is saved in the following directory:
InsuranceApp/src/Policy/FileData/output.json

The output.json file is run in the App's Processor in `InsuranceApp` root directory and with the command `php src/Policy/Processor.php` . The JSON file will get a file sent to the `FileData` directory if the same file name isn't in said directory.

You can also change the year in the Processor by adding it as a string argument to the method `processTivData` on the last line. The current data set only has TIV for 2011 and 2012 and only 2012 was requested in the requirements for this project.

Tests can be run with the following command in the root directory: `./vendor/bin/phpunit tests`

# Conclusion

I enjoyed making this app and feel free to reach out with any questions!

## Authors

- [@mark-kohrman](https://www.github.com/mark-kohrman)
