<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HWIPDF extends TCPDF
{
    protected $title = '';
    protected $HEADER_LOGO = 'hwi_letterhead.png';
    protected $FOOTER_LOGO = 'footer.jpeg';
    protected $withPageNumber = true;

    public function init($title = '', $header = 'hwi_letterhead.png', $footer = 'footer.jpeg', $orientation = 'P')
    {
        $this->title = $title;
        $this->HEADER_LOGO = $header;
        $this->FOOTER_LOGO = $footer;

        $this->SetMargins(PDF_MARGIN_LEFT, 32);
        $this->SetAutoPageBreak(TRUE, 41);
        $this->setFont('freesans', '', 12);
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $this->SetTitle($title);
        $this->AddPage($orientation, 'A4');
    }

    public function _destroy($destroyall = false, $preserve_objcopy = false)
    {
        if ($destroyall) {
            unset($this->imagekeys);
        }

        parent::_destroy($destroyall, $preserve_objcopy);
    }

    //Page header
    public function Header()
    {
        if ($this->HEADER_LOGO) {
            $headerImage = FCPATH.'public/images/'.$this->HEADER_LOGO;
            $this->Image($headerImage, 20, 0, 200, '', '', '', 'C', false, 300, 'C', false, false, 0, false, false, false);
        }
    }

    // Page footer
    public function Footer()
    {
        if ($this->FOOTER_LOGO) {
            $footerImage = FCPATH. 'public/images/'.$this->FOOTER_LOGO;
            $this->Image($footerImage, 0, 260, 225, '', '', '', 'C', false, 300, 'C', false, false, 0, false, false, false);
        }

        if ($this->withPageNumber){
            // Page number
            // Set font
            $this->SetFont('helvetica', '', 10);
            $this->SetTextColor(179, 179, 179);

            // VERTICAL
            $this->StartTransform();
            $x = $this->w - 10;
            $y = $this->h - 35;
            $this->Rotate(90, $x, $y);
            $this->Text($x, $y, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages());
            $this->StopTransform();

            if ($this->page > 1) {
                $this->StartTransform();
                $x = 6;
                $y = $this->h - 35;
                $this->Rotate(90, $x, $y);
                $this->Text($x, $y, $this->title);
                $this->StopTransform();
            }
        }
    }

    public function withPageNumber($display = true)
    {
        $this->withPageNumber = $display;
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
