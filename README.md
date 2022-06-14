# InsuranceApp

This is a project for a Dealer Inspire PHP Developer job application process.

The project took a CSV file with Insurance policy data and converted it to a JSON file that shows the aggregate Total Insurable Value in 2012 by county.

The output.json file (which is the answer for this challenge) is saved in the following directory:
InsuranceApp/src/Policy/FileData/output.json

The output.json file is run in the App's Processor in `InsuranceApp` root directory and with the command `php src/Policy/Processor.php` . The JSON file will get a file sent to the `FileData` directory if the same file name isn't in said directory.

You can also change the year in the Processor by adding it as a string argument to the method `processTivData` on the last line. The current data set only has TIV for 2012 and 2011 and only 2012 was requested in the requirements for this project.

Tests can be run with the following command in the root directory: `./vendor/bin/phpunit tests`

# Things I Would Have Done If I Had More Time

I didn't have time to write a lot of tests, but set up a few and more can be written in the tests directory. I know testing is important that is why I included it, but didn't have the time to write them. I would have written unit tests for each Class verifying the output of each method is what I'm looking for. I saw that my JSON file was outputting what I wanted when I compared it to the CSV in Excel.

I also would have liked to drill into the floating point value issue I was runnning into. I ended up formatting it so that the output sums the numbers correctly, but I wanted to do more research into an efficient way to add them so that the trailing values don't get added in the first place. I believe the output is what we were looking for, but just wanted to let you know that's something I thought a lot about.

# Conclusion

I enjoyed making this app and feel free to reach out with any questions!

## Authors

- [@mark-kohrman](https://www.github.com/mark-kohrman)
