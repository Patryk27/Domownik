<?php

namespace App\Console\Commands\Assets;

use App\Services\I18n\JsLocalizationGenerator;
use Illuminate\Console\Command;

class Compile
    extends Command {

    /**
     * @var string
     */
    protected $signature = 'assets:compile';

    /**
     * @var string
     */
    protected $description = 'Refreshes the JS translation messages.';

    /**
     * @var JsLocalizationGenerator
     */
    protected $jsLocalizationGenerator;

    /**
     * @param JsLocalizationGenerator $jsMessageGenerator
     */
    public function __construct(
        JsLocalizationGenerator $jsMessageGenerator
    ) {
        parent::__construct();

        $this->jsLocalizationGenerator = $jsMessageGenerator;
    }

    /**
     * @return void
     */
    public function handle() {
        $outputFileName = public_path('js/localization.js');

        $this->info('Creating the localization file...');

        $this->jsLocalizationGenerator
            ->setLocalizationFileName($outputFileName)
            ->generateLocalizationFile();

        $this->info(sprintf('Localization file has been saved to: %s', $outputFileName));
    }
}
