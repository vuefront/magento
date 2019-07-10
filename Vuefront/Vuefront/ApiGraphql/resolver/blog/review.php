<?php

require_once VF_SYSTEM_DIR.'engine/resolver.php';

use \Magento\Framework\App\ObjectManager;

class ResolverBlogReview extends Resolver
{
    public function add($args)
    {
        $objectManager =ObjectManager::getInstance();
        $commentFactory = $objectManager->get('Magefan\Blog\Model\CommentFactory');
        $customerSession = $objectManager->get('\Magento\Customer\Model\Session');

        $comment = $commentFactory->create();

        $comment->setData(array(
            'post_id' => $args['id'],
            'author_nickname'  => $args['author'],
            'author_email' => '',
            'text' => $args['content']
        ));

        $comment->setStatus(
            $this->getConfigValue(
                \Magefan\Blog\Helper\Config::COMMENT_STATUS,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            )
        );

        if ($customerSession->getCustomerGroupId()) {
            /* Customer */
            $comment->setCustomerId(
                $customerSession->getCustomerId()
            )->setAuthorNickname(
                $customerSession->getCustomer()->getName()
            )->setAauthorEmail(
                $customerSession->getCustomer()->getEmail()
            )->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::CUSTOMER
            );
        } elseif ($this->getConfigValue(
            \Magefan\Blog\Helper\Config::GUEST_COMMENT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )) {
            $comment->setCustomerId(0)->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::GUEST
            );
        } else {
            throw new Exception('Login to submit comment');
        }

        $comment->save();

        return $this->load->resolver('blog/post/get', $args);
    }

    public function get($data)
    {
        $post = $data['parent'];
        $this->load->model('blog/review');
        $result  = $this->model_blog_review->getReviews($post['id']);

        $comments = array();


        foreach ($result as $comment) {
            $comments[] = array(
                'author'       => $comment['author_nickname'],
                'author_email' => $comment['author_email'],
                'created_at'   => $comment['creation_time'],
                'content'      => $comment['text'],
                'rating'       => 0
            );
        }

        return array(
            'content'=> $comments,
            'totalElements'=> $count($comments)
        );
    }

    public function getConfigValue($path)
    {
        $objectManager =ObjectManager::getInstance();

        $config = $objectManager->get(\Magento\Framework\App\Config\ScopeConfigInterface::class);
        return $config->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
