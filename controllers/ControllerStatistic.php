<?php

/**
 * ControllerStatistic
 */
class ControllerStatistic extends ControllerBase {
    
    /**
     * yearCount: The number of years to include in the statistics
     *
     * @var int
     */
    private $yearCount = 5;
    
    /**
     * months: An array mapping month numbers to their names
     *
     * @var array
     */
    private $months = [
        "01" => "Januar",
        "02" => "Februar",
        "03" => "März",
        "04" => "April",
        "05" => "Mai",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "August",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Dezember",
    ];
    
    /**
     * index: The default action for the controller. Does nothing
     *
     * @return void
     */
    function index() {
        //No index action
    }
    
    /**
     * endcontract: Action for generating statistics on contract end dates
     *
     * @return void
     */
    function endcontract() {
        // Check if the session user exists, redirect to login if not
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        // Get the statistics data from the repository
        $repo = new RepositoryContract($this->registry);
        $entries = $repo->endcontract($_POST);

        // Generate an array of years to include in the statistics
        $years = [];
        for ($i =0; $i < $this->yearCount; $i++) {
            $years[] = date("Y") - $this->yearCount + ($i + 1);
        }

        // Pass the data to the view.
        $this->registry['view']->set('years', $years);
        $this->registry['view']->set('months', $this->months);
        $this->registry['view']->set('filters', $_POST);
        $this->registry['view']->set('entries', $entries);
        $this->registry['view']->show('ViewStatisticEndcontract');
    }
    
    /**
     * salesvolume: Action for generating statistics on sales volume
     *
     * @return void
     */
    function salesvolume() {
        // Check if the session user exists, redirect to login if not
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        // Get the statistics data from the repository
        $repo = new RepositoryContract($this->registry);
        $entries = $repo->salesvolume($_POST);

        // Generate an array of years to include in the statistics
        $years = [];
        for ($i =0; $i < $this->yearCount; $i++) {
            $years[] = date("Y") - $this->yearCount + ($i + 1);
        }

        // Pass the data to the view
        $this->registry['view']->set('years', $years);
        $this->registry['view']->set('filters', $_POST);
        $this->registry['view']->set('entries', $entries);
        $this->registry['view']->show('ViewStatisticSalesvolume');
    }
    
}