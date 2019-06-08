<?php
/**
 * Pruba 01
 * 
 */

namespace Greenter\Report;

use Greenter\Model\DocumentInterface;
use \Dompdf\Dompdf;

/**
 * Class DompdfReport.
 */
class DompdfReport implements ReportInterface
{
    /**
     * @var ReportInterface
     */
    private $htmlReport;

    /**
     * @var string
     */
    private $html;

    /**
     * @var Dompdf
     */
    private $pdfRender;

    /**
     * DompdfReport constructor.
     *
     * @param ReportInterface $htmlReport
     */
    public function __construct(ReportInterface $htmlReport)
    {
        $this->htmlReport = $htmlReport;
        $this->pdfRender = new Dompdf([
            'no-outline', // Make Chrome not complain
        ]);
    }

    /**
     * Return last html generated.
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param DocumentInterface $document
     * @param array             $parameters
     *
     * @return mixed
     */
    public function render(DocumentInterface $document, $parameters = [])
    {
        $this->html = $this->htmlReport->render($document, $parameters);

        return $this->buildPdf($this->html);
    }

    /**
     * Dompdf Options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->pdfRender->set_options($options);
    }

    /**
     * @return Dompdf
     */
    public function getExporter()
    {
        return $this->pdfRender;
    }

   

    private function buildPdf($html)
    {
        // $this->domRender->setPaper('A4', 'landscape');
        $this->pdfRender->loadHtml($html);
        $this->pdfRender->render();
        return $this->pdfRender->stream();
    }
    
}
